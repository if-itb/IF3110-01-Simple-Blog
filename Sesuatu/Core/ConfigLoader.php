<?php namespace App\Core;


class ConfigLoader
{
    /**
     * Stores all loaded config file
     * @var array
     */
    protected static $cachedConfig = [];

    /**
     * The location of the configuration file
     * @var string
     */
    protected $filename;

    /**
     * Alias name for the config
     * @var string
     */
    protected $alias;

    /**
     * ConfigLoader constructor.
     *
     * @param string $configFile
     * @param string|null $alias
     */
    public function __construct($configFile, $alias = null) {
        if (!realpath($configFile)) {
            // we assume that it is located in ROOT_PATH/{configFile}.php
            $this->filename = ROOT_PATH."/config/{$configFile}.php";
        } else {
            $this->filename = $configFile;
        }

        if (!file_exists($this->filename)) {
            throw new \RuntimeException("Config file {$this->filename} does not exist!");
        }

        // set the alias
        if (!$alias) {
            $this->alias = pathinfo($this->filename)['filename'];
        } else {
            $this->alias = $alias;
        }

        if (isset(self::$cachedConfig[$this->alias])) {
            throw new \InvalidArgumentException("Config file with alias {$this->alias} has been loaded!");
        }
    }

    /**
     * Get the alias of the config
     *
     * @return string
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Get the location of the config file
     *
     * @return string
     */
    public function getFilename() {
        return $this->filename;
    }

    /**
     * Parse the config file and caches it as an array.
     *
     * @return array
     */
    public function parse() {
        $result = null;
        if (!self::isLoaded($this->alias)) {
            $pathInfo = pathinfo($this->filename);
            switch($pathInfo['extension']) {
                case 'php':
                    $result = include $this->filename;
                    break;
                default: // parse as .ini file
                    $result = parse_ini_file($this->filename);

                    if (!$result) {
                        throw new \RuntimeException("Cannot parse file at {$this->filename}!");
                    }
            }

            // cache the result
            self::$cachedConfig[$this->alias] = $result;
        } else {
            $result = self::getCachedConfig($this->alias);
        }

        return $result;
    }

    /**
     * Shorthand method to load config by alias
     *
     * @param $configAlias
     * @return array
     */
    public static function load($configAlias) {
        if (!isset(self::$cachedConfig[$configAlias])) {
            $loader = new ConfigLoader($configAlias);

            return $loader->parse();
        }

        return self::getCachedConfig($configAlias);
    }

    /**
     * Shorthand for loading the environment variables
     * Also sets all variables defined in ROOT_PATH/.env to the $_ENV
     *
     * @return array
     */
    public static function loadEnv() {

        $result = null;
        if (!self::isLoaded('env')) {
            $loader = new ConfigLoader(ROOT_PATH.'/.env', 'env');

            $result = $loader->parse();

            // add the result to env
            foreach ($result as $key => $value) {
                $_ENV[$key] = $value;
            }
        } else {
            $result = self::getCachedConfig('env');
        }

        return $result;
    }

    /**
     * Get the cached config
     *
     * @param string|null $alias the name of the config to be fetched
     * @return array
     */
    public static function getCachedConfig($alias = null) {
        if ($alias) {
            if (self::isLoaded($alias)) {
                return self::$cachedConfig[$alias];
            } else {
                return [];
            }
        }

        return self::$cachedConfig;
    }

    /**
     * Check whether a config with a certain alias has been loaded.
     *
     * @param $alias
     * @return bool
     */
    public static function isLoaded($alias) {
        return isset(self::$cachedConfig[$alias]);
    }

    /**
     * Shorthand for getting the environment variable
     *
     * @param string $key the key to be fetched
     * @param null $default the default value if it does not exists in the database
     * @return mixed
     */
    public static function env($key, $default = null) {
        if (!self::isLoaded('env')) {
            self::loadEnv();
        }

        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        } else {
            return $default;
        }
    }
}