<?php namespace App\Controller;

use App\Core\ConfigLoader;
use App\Core\Controller as BaseController;
use App\Core\DB\PDOConnection;
use App\Core\Exception\DecryptException;
use App\Core\Security\Encrypter;
use App\Core\SessionManager;
use App\Core\View;

class AuthController extends BaseController
{
    protected $ignoreBeforeList = [
        'getLogout'
    ];

    /**
     * Checks for `remember_token` in the cookie.
     *
     * If exists, try to validate the remember token.
     * If the token is invalid, then just ignore it, unset, and continue.
     * If the token is valid, then log in the user.
     */
    public function before() {
        $session = SessionManager::getManager();
        var_dump($session);

        if ($session->isLoggedIn()) {
            $this->redirect('/');
            exit;
        }

        $rememberToken = null;
        if (isset($_COOKIE) && isset($_COOKIE['remember_token'])) {
            try {
                $encrypter = Encrypter::getInstance();
                $rememberToken = $encrypter->decrypt($_COOKIE['remember_token']);
            } catch (DecryptException $e) {
                $rememberToken = null;

                // unset the cookie
                setcookie('remember_token', '', 1);
            }
        }

        if ($rememberToken) {
            $connection = PDOConnection::getInstance();
            $user = $connection->selectOne('users', [
                'remember_token' => $rememberToken
            ]);

            if ($user) {
                // log in the user
                $session->destroy();
                $session->start();

                $session->set('user', $user);
                $this->redirect('/');

                exit;
            } else {

                // unset the cookie
                setcookie('remember_token', '', 1);
            }
        }
    }

    /**
     * Displays the login page
     */
    public function getLogin() {
        // redirect if user has been logged in
        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $view->inject('content', 'login');
        $view->set('pageTitle', 'Login');

        $view->addJavascript('/assets/js/js-cookie.js');
        $view->addJavascript('/assets/js/login.js');

        // csrf
        $manager = SessionManager::getManager();
        $manager->generateCsrfToken();

        echo $view->output();
    }

    /**
     * Handles login page submission
     */
    public function postLogin() {
        // some assumptions:
        // 1. the user hashed his/her password
        // 2. if the user's logged in, then he should have his id set in the $_SESSION['id'] variable
        if (!isset($_POST)) {
            throw new \RuntimeException("No data posted.", 400);
        }
        if (!isset($_POST['username']) or !isset($_POST['password'])) {
            throw new \RuntimeException("Missing username or password.", 400);
        }

        $session = SessionManager::getManager();
        { // check the CSRF token
            $fetchedCsrf = null;
            if (isset($_POST['csrf_token'])) {
                $fetchedCsrf = $_POST['csrf_token'];
            } elseif (isset($_SERVER['HTTP_X_CSRF_TOKEN'])) {
                $fetchedCsrf = $_SERVER['HTTP_X_CSRF_TOKEN'];
            }
            if (!$fetchedCsrf) {
                throw new \RuntimeException("Missing CSRF token.", 400);
            }
            if (!$session->checkCsrf($fetchedCsrf)) {
                throw new \RuntimeException('CSRF token mismatch.', 400);
            }
        }

        // check the user's credentials
        $connection = PDOConnection::getInstance();
        $user = $connection->selectOne('users', [
            'username' => $_POST['username']
        ]);

        if (!$user) {
            // redirect the user back to login page
            $this->redirect('/auth/login');
            exit;
        } else {
            // match the user password
            $valid = password_verify($_POST['password'], $user['password']);

            if ($valid) {
                assert($session->restart() === true);
                $session->set('user', $user);

                // if remember_me is set to true, then
                // generate a token for the user
                // TODO: bind the remember_me to User-Agent?
                if (isset($_POST['remember_me']) && $_POST['remember_me'] == true) {
                    $rememberToken = hash('sha512', bin2hex(openssl_random_pseudo_bytes(16)));

                    $pdo = $connection->getDriver();
                    $statement = $pdo->prepare("UPDATE users SET remember_token=:token WHERE id=:id");
                    $result = $statement->execute([
                        ':token' => $rememberToken,
                        ':id' => $user['id']
                    ]);

                    if (!$result) {
                        // setting the token failed!
                        // just silently ignore
                    } else {
                        $encrypter = Encrypter::getInstance();
                        $tokenCookie = $encrypter->encrypt($rememberToken);

                        // apply for ~30 days
                        setcookie('remember_token', $tokenCookie, time() + (30 * 24 * 60 * 60));
                    }
                }
            } else {
                // redirect back to login page
                die('password mismatch!');
                $this->redirect('/auth/login');
                exit;
            }
        }

        $this->redirect('/');
    }

    public function getLogout() {
        $session = SessionManager::getManager();

        if ($session->isLoggedIn()) {
            $session->destroy();

            $this->redirect('/');
        } else {
            throw new \RuntimeException('User not logged in.', 404);
        }
    }

    public function getRegister() {
        $view = new View('layout');
        $view->set('pageTitle', 'Register');
        $view->inject('navbar', 'navbar');
        $view->inject('content', 'register');

        $view->addJavascript('/assets/js/js-cookie.js');
        $view->addJavascript('/assets/js/register.js');

        // csrf
        $session = SessionManager::getManager();
        $session->generateCsrfToken();

        echo $view->output();
    }

    public function postRegister() {
        // some assumptions:
        // 1. the user hashed his/her password
        // 2. if the user's logged in, then he should have his id set in the $_SESSION['id'] variable
        if (!isset($_POST)) {
            throw new \RuntimeException("No data posted.", 400);
        }

        if (empty($_POST['username']) or empty($_POST['password']) or empty($_POST['password_confirmation'])) {
            throw new \RuntimeException("Missing username or password.", 400);
        }

        // check the CSRF token
        $fetchedCsrf = null;
        if (isset($_POST['csrf_token'])) {
            $fetchedCsrf = $_POST['csrf_token'];
        } elseif (isset($_SERVER['HTTP_X_CSRF_TOKEN'])) {
            $fetchedCsrf = $_SERVER['HTTP_X_CSRF_TOKEN'];
        }

        if (!$fetchedCsrf) {
            throw new \RuntimeException("Missing CSRF token.", 400);
        }

        $session = SessionManager::getManager();
        if (!$session->checkCsrf($fetchedCsrf)) {
            throw new \RuntimeException('CSRF token mismatch.', 400);
        }

        // username regex explanation:
        // 1. username is 8-20 chars long
        // 2. no _ or . at the beginning
        // 3. no __ or _. or ._ or .. inside
        // 4. allowed characters: alphanumeric, dot (.) and underscore (_)
        // 5. no _ or . at the end
        $regexResult = preg_match('/(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])/',
            $_POST['username'], $matches);

        if (!$regexResult) {
            // the username is problematic
            $this->redirect('/auth/register');
        }
        $username = $matches[0];

        // check for password sameness
        if (strcmp($_POST['password'], $_POST['password_confirmation']) !== 0) {
            $this->redirect('/auth/register');
        }
        $password = $_POST['password'];

        $connection = PDOConnection::getInstance();
        $user = $connection->selectOne('users', [
            'username' => $username
        ]);

        if (!$user) {
            $result = $connection->insert('users', [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT)
            ]);


            if ($result) { // user successfully registered
                $this->redirect('/auth/login');
            } else {
                $error = $connection->getDriver()->errorInfo();
                var_dump($error);

                throw new \RuntimeException("Cannot create user:", 500);
            }
        } else {
            // redirect back to register page
            // TODO: show error page!
            $this->redirect('/auth/register');
        }
    }
}