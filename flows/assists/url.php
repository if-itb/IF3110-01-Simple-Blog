<?php

require_once dirname(__DIR__) . "/scenario.php";

class URL
{
    private static $baseurl = BASEURL;

    public static function make($part, $action)
    {
        return self::$baseurl . "/flows/" . $part . "/" .$action . ".php";
    }
    
    public static function get($param = null)
    {
        $url = self::$baseurl;
        if (count($param) > 0)
        {
            $url .= "?";
            foreach ($param as $k => $v)
            {
                $url .= htmlspecialchars($k) . "=" . htmlspecialchars($v);
                
                end($param);
                if ($k !== key($param))
                {
                    $url .= "&";
                }
            }
        }
        return $url;
    }
    
    public static function edit_post($id = NULL)
    {
        $param = array("do" => "edit");
        if ($id != NULL)
        {
            $param["id"] = $id;
        }
        return self::get($param);
    }
    
    public static function view_post($id)
    {
        $param = array(
            "do" => "view",
            "id" => $id
        );
        return self::get($param);
    }
    
    public static function view_random()
    {
        $param = array (
            "do" => "random"
        );
        return self::get($param);
    }
    
    public static function delete_post($id)
    {
        $param = array(
            "do" => "delete", 
            "id" => $id
        );
        return self::get($param);
    }
}



?>