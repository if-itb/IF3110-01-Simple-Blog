<?php namespace App\Core;

use App\Core\DB\MySqlSessionHandler;
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
     * The current handler set to the session
     *
     * @var \SessionHandlerInterface
     */
    protected static $defaultHandler;

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

    public static function getManager($driver = 'database') {
        switch ($driver) {
            case 'database':
                // get the Database driver
                $dbConfig = ConfigLoader::load('database');

                $pdo = new \PDO("mysql:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['database']}",
                    $dbConfig['username'],
                    $dbConfig['password']);
                $handler = new MySqlSessionHandler($pdo, ConfigLoader::env('SESSION_TABLE', 'sessions'));

                return new SessionManager($handler);
        }

        // should not reach this part
        throw new \RuntimeException('No driver defined!');
    }

    /**
     * Set the default manager for the session and starts it
     *
     * @param SessionManager $manager
     */
    public static function setDefaultManager($manager) {
        self::$defaultHandler = $manager->handler;

        /**
         * Start if it has not been started yet
         */
        if (session_status() !== PHP_SESSION_ACTIVE) {
            @session_start();

        }

        session_set_save_handler(self::$defaultHandler, true);
        session_name($manager->name);
        session_id($manager->id);

        /**
         * Auto-regenerate session
         */
        if (rand(1, 100) <= 5) {
            $manager->regenerateId();
        }
    }

    public function __construct($handler, $name = null) {
        $this->handler = $handler;
        $this->name = !empty($name) ? $name : ConfigLoader::env('SESSION_NAME', 'session_id');

        if (session_status() === PHP_SESSION_ACTIVE) {
            $this->id = session_id();
        } else {
            session_start();
            $this->id = session_id();
        }

        if (!isset(self::$defaultHandler)) {
            self::setDefaultManager($this);
        }

        // some random chance to regenerate the id
    }

    public function get($key, $default = null) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function regenerateId($destroy = false) {
        if ($destroy) {
            $_SESSION = [];
            session_regenerate_id($destroy);
        } else {
            // If this session is obsolete it means there already is a new id
            if(isset($_SESSION['OBSOLETE']) && $_SESSION['OBSOLETE'] == true)
                return;

            // Set current session to expire in 10 seconds
            $_SESSION['OBSOLETE'] = true;
            $_SESSION['EXPIRES'] = time() + 10;

            // Create new session without destroying the old one
            session_regenerate_id($destroy);

            // Grab current session ID and close both sessions to allow other scripts to use them
            $newSession = session_id();
            session_write_close();

            // Set session ID to the new one, and start it back up again
            session_id($newSession);
            session_start();

            // Now we unset the obsolete and expiration values for the session we want to keep
            unset($_SESSION['OBSOLETE']);
            unset($_SESSION['EXPIRES']);
        }

        $this->id = session_id();
    }

    public function generateCsrfToken() {
        // generate random string
        $randBytes = bin2hex(openssl_random_pseudo_bytes(16));

        $_SESSION['CSRF-TOKEN'] = [
            'value' => $randBytes,
            'expires_at' => time() + 300 // expires after 5 minutes
        ];

        $crypt = Encrypter::getInstance();
        $csrf = $crypt->encrypt($randBytes);

        return $csrf;
    }

    public function isLoggedIn() {
        return isset($_SESSION) && isset($_SESSION['user']);
    }

    public function checkCsrf($token) {
        $token = (string) $token;

        $crypt = Encrypter::getInstance();

        $calculatedCsrf = $crypt->decrypt($token);
        $storedCsrf = $this->get('CSRF-TOKEN');
        assert (isset($storedCsrf) && isset($storedCsrf['value']) && isset($storedCsrf['expires_at']));

        if ($storedCsrf['expires_at'] < time()) {
            return false;
        }

        return $crypt->isHashEqual($calculatedCsrf, $storedCsrf['value']);
    }
}