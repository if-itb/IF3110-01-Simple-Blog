<?php

require_once dirname(__DIR__) . "/scenario.php";
    
class DataBase
{
    private static $mysqli = null;
    private static $connected = false;

    public function __construct($auto = false)
    {
        if ($auto)
        {
            self::connect();
        }
    }
    
    
    public function __destruct()
    {
        if (self::$connected) 
        {
            mysqli_close(self::$mysqli);
        }
    }
    
    public function connect()
    {
        if (! self::$connected)
        {
            global $db_host, $db_user, $db_pass, $db_name;
            self::$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
            if (self::$mysqli->connect_errno)
            {
                echo "Failed to connect: (" . self::$mysqli->connect_errno . ") " . self::$mysqli->connect_error;
            } else
            {
                self::$connected = true;
            }
        }
    }
    
    /* Normal query, not prepared */
    public function query($query, $param)
    {
        self::connect();
        if ($param != null)
        {
            foreach ($param as $key => $value)
            {
                $query = str_ireplace("%{$key}%", mysqli_real_escape_string(self::$mysqli, $value), $query);
            }
        }
        $result = mysqli_query(self::$mysqli, $query);
        if (stripos($query, "INSERT") !== false || stripos($query, "UPDATE") !== false) 
        {
            return mysqli_insert_id(self::$mysqli);
        } else 
        {
            return $result;
        }
    }
}

