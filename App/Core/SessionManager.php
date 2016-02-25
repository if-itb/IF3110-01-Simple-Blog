<?php namespace App\Core;

use App\Core\DB\MySqlSessionHandler;
use App\Core\DB\PDOConnection;
use App\Core\Exception\DecryptException;
use App\Core\Security\Encrypter;

/**
 * Class SessionManager
 * Handles all stuff related to session management
 *
 * @package App\Core
 */
class SessionManager
{
    /**
     * The current manager used for the sessions.
     *
     * @var SessionManager
     */
    protected static $currentManager;

    /**
     * The hash function to be used to hash the sessions
     * We use the best hashing function available
     *
     * @see http://php.net/manual/en/session.configuration.php#ini.session.hash-function
     */
    const HASH_FUNCTION = 'sha512';

    /**
     * The hash bits used to hash the sessions
     * We use the most secure possibility
     *
     * @see http://php.net/manual/en/session.configuration.php#ini.session.hash-bits-per-character
     */
    const HASH_BITS_PER_CHAR = 6;

    /**
     * The handler
     *
     * @var \SessionHandlerInterface
     */
    protected $handler;

    /**
     * @var string
     */
    protected $id;

    /**
     * Name of the session
     *
     * @var string
     */
    protected $name;

    /**
     * Whether this session is injected or not
     *
     * @var boolean
     */
    protected $injected = false;

    public static function getManager($driver = 'database') {
        switch ($driver) {
            case 'database':
                if (!isset(self::$currentManager)) {
                    $pdo = PDOConnection::getInstance()->getDriver();
                    $handler = new MySqlSessionHandler($pdo);
                    $manager = new SessionManager($handler);

                    $manager->injectToPhp();
                    return $manager;
                } else {
                    if (self::$currentManager instanceof MySqlSessionHandler) {
                        return self::$currentManager;
                    } else {
                        $pdo = PDOConnection::getInstance()->getDriver();
                        $handler = new MySqlSessionHandler($pdo);
                        $manager = new SessionManager($handler);

                        $manager->injectToPhp();
                        assert($manager->injected === true);
                        return $manager;
                    }
                }
        }

        // should not reach this part
        throw new \RuntimeException('No driver defined!');
    }

    public function __construct($handler, $id = null, $name = null) {
        $this->handler = $handler;
        $this->name = isset($name) ? $name : ConfigLoader::env('SESSION_NAME', 'session_id');

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return SessionManager
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return SessionManager
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Injects the current SessionManager as the driver to be used in PHP
     */
    public function injectToPhp() {
        if ($this !== self::$currentManager) {
            try {
                // set the default stuff first
                if (ini_get('session.hash_function') !== self::HASH_FUNCTION) {
                    ini_set('session.hash_function', self::HASH_FUNCTION);
                }
                if (ini_get('session.hash_bits_per_character') != self::HASH_BITS_PER_CHAR) {
                    ini_set('session.hash_bits_per_character', self::HASH_BITS_PER_CHAR);
                }

                // close the old session handle, if exists
                if (isset(self::$currentManager)) {
                    session_write_close();
                    self::$currentManager->injected = false;
                }

                // inject the new one
                session_set_save_handler($this->handler);
                session_name($this->name);

                // start the session
                session_start();
                $this->id = session_id();

                assert(!empty($this->id));
                $this->injected = true;
            } catch (\Exception $e) {
                throw new \RuntimeException('Cannot inject session to PHP!', 500, $e);
            }
        }
    }

    /**
     * Starts the session.
     * This will refresh the session id.
     * Only works when the session has been injected.
     *
     * @return bool
     */
    public function start() {
        if ($this->injected) {
            $result = session_start();
            if ($result === false) {
                throw new \RuntimeException('Cannot start session!');
            }

            $this->id = session_id();

            return $result;
        }

        return false;
    }

    /**
     * Get a variable from the session
     *
     * @param string $key the reference to the session
     * @param mixed $default the default element
     * @return mixed
     */
    public function get($key, $default = null) {
        if ($this->injected) {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
        }

        return $default;
    }

    /**
     * Write a variable to the session
     *
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value) {
        if ($this->injected) {
            $_SESSION[$key] = $value;
        } else {
            throw new \RuntimeException('Session is not injected!');
        }
    }

    /**
     * Regenerates id for the session
     */
    public function regenerateId() {
        // If this session is obsolete it means there already is a new id
        if(isset($_SESSION['OBSOLETE']) && $_SESSION['OBSOLETE'] == true)
            return;

        // Set current session to expire in 10 seconds
        $_SESSION['OBSOLETE'] = true;
        $_SESSION['EXPIRES'] = time() + 10;

        // Create new session without destroying the old one
        session_regenerate_id();

        // Grab current session ID and close both sessions to allow other scripts to use them
        $this->id = session_id();
        $this->flush();

        // Now we unset the obsolete and expiration values for the session we want to keep
        unset($_SESSION['OBSOLETE']);
        unset($_SESSION['EXPIRES']);
    }

    /**
     * Writes the old session and restarts it
     */
    public function flush() {
        if ($this->injected) {
            session_write_close();

            session_id($this->id);
            session_start();
        }
    }

    /**
     * Destroy all data from the old session, without closing it.
     *
     * @return boolean true on success, false on failure
     */
    public function destroy() {
        if ($this->injected) {
            return session_destroy();
        }

        return false;
    }

    /**
     * Restarts the session.
     * WARNING: this destroys the old session data.
     *
     * @return bool
     */
    public function restart() {
        if ($this->injected) {
            $result = $this->destroy();
            if ($result === true) {
                $result = $this->start();
            }

            return $result;
        }

        return false;
    }

    /**
     * Generates a CSRF token and puts it into the cookie
     *
     * @param int $lifetime the validity duration of the CSRF token. Measured in seconds. Defaults to 5 min (300 s).
     * @return string
     */
    public function generateCsrfToken($lifetime = 300) {
        // generate random string
        $randBytes = bin2hex(openssl_random_pseudo_bytes(16));

        $_SESSION['CSRF-TOKEN'] = [
            'value' => $randBytes,
            'expires_at' => time() + $lifetime
        ];

        $crypt = Encrypter::getInstance();
        $csrf = $crypt->encrypt($randBytes);

        // put the token at the cookie
        setcookie('X-XSRF-TOKEN', $csrf, time() + $lifetime);

        return $csrf;
    }

    /**
     * Checks whether a user has been logged in or not
     *
     * @return bool
     */
    public function isLoggedIn() {
        return isset($_SESSION) && isset($_SESSION['user']);
    }

    /**
     * Checks whether a CSRF is valid or not.
     *
     * @param string $token
     * @return bool
     */
    public function checkCsrf($token) {
        $token = (string) $token;

        $crypt = Encrypter::getInstance();

        try {
            $calculatedCsrf = $crypt->decrypt($token);
            $storedCsrf = $this->get('CSRF-TOKEN');
            assert (isset($storedCsrf) && isset($storedCsrf['value']) && isset($storedCsrf['expires_at']));

            if ($storedCsrf['expires_at'] < time()) {
                return false;
            }

            return $crypt->isHashEqual($calculatedCsrf, $storedCsrf['value']);
        } catch (DecryptException $e) {
            return false;
        }
    }
}