<?php namespace App\Controller;

use App\Core\ConfigLoader;
use App\Core\Controller as BaseController;
use App\Core\DB\PDOConnection;
use App\Core\SessionManager;
use App\Core\View;

class AuthController extends BaseController
{
    public function getLogin() {

        // redirect if user has been logged in

        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $view->inject('content', 'login');

        // csrf
        $manager = SessionManager::getManager();
        $csrf = $manager->generateCsrfToken();

        // put the token at the header
        header("X-XSRF-TOKEN: {$csrf}");

        echo $view->output();
    }

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

        // check the CSRF token
        $fetchedCsrf = isset($_POST['CSRF-TOKEN']) ? $_POST['CSRF-TOKEN'] :
            isset($_SERVER['HTTP_X-XSRF-TOKEN']) ? $_SERVER['HTTP_X-XSRF-TOKEN'] : null;

        if (!$fetchedCsrf) {
            throw new \RuntimeException("Missing CSRF token.", 400);
        }

        $session = SessionManager::getManager();
        if (!$session->checkCsrf($fetchedCsrf)) {
            throw new \RuntimeException('CSRF token mismatch.', 400);
        }

        // check the user's credentials
        $connection = PDOConnection::getInstance();
        $user = $connection->selectOne('users', [
            'username' => $_POST['username']
        ]);

        if (!$user) {
            // redirect the user back to login page
            // and regenerate its CSRF token
            $csrf = $session->generateCsrfToken();

            header("X-XSRF-TOKEN: {$csrf}");
            header('Location: /auth/login', true, 302);
        } else {

        }

        $session->regenerateId(true);

        header('Location: /', true, 302);
    }

    public function getLogout() {
        $session = SessionManager::getManager();

        if ($session->isLoggedIn()) {
            $session->regenerateId(true);

            header('Location: /', true, 302);
        } else {
            throw new \RuntimeException('User not logged in.', 404);
        }
    }

    public function getRegister() {
        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $view->inject('content', 'register');

        echo $view->output();
    }

    public function postRegister() {
        // some assumptions:
        // 1. the user hashed his/her password
        // 2. if the user's logged in, then he should have his id set in the $_SESSION['id'] variable
        if (!isset($_POST)) {
            throw new \RuntimeException("No data posted.", 400);
        }

        if (!isset($_POST['username']) or !isset($_POST['password']) or !isset($_POST['password_confirmation'])) {
            throw new \RuntimeException("Missing username or password.", 400);
        }

        // check the CSRF token
        $fetchedCsrf = isset($_POST['CSRF-TOKEN']) ? $_POST['CSRF-TOKEN'] :
            isset($_SERVER['HTTP_X-XSRF-TOKEN']) ? $_SERVER['HTTP_X-XSRF-TOKEN'] : null;

        if (!$fetchedCsrf) {
            throw new \RuntimeException("Missing CSRF token.", 400);
        }

        $session = SessionManager::getManager();
        if (!$session->checkCsrf($fetchedCsrf)) {
            throw new \RuntimeException('CSRF token mismatch.', 400);
        }

        // check the username

        // regex explanation:
        // 1. username is 8-20 chars long
        // 2. no _ or . at the beginning
        // 3. no __ or _. or ._ or .. inside
        // 4. allowed characters: alphanumeric, dot (.) and underscore (_)
        // 5. no _ or . at the end
        $regexResult = preg_match(`(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])/`,
            $_POST['username'], $matches);

        if (!$regexResult) {
            // the username is problematic

            header('Location: /auth/register', true, 301);
        }
        $username = $matches[0];

        // check for password sameness
        if (strcmp($_POST['password'], $_POST['password_confirmation']) !== 0) {
            header('Location: /auth/register', true, 301);
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
                header('Location: /auth/login', true, 301);
            } else {
                $error = $connection->getDriver()->errorInfo();
                var_dump($error);

                throw new \RuntimeException("Cannot create user:", 500);
            }
        } else {
            // redirect back to register page
            // TODO: show error page!

            header('Location: /auth/register', true, 301);
        }
    }
}