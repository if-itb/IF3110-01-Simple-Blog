<?php

require_once dirname(__DIR__) . "/assists/database.php";

class Comment
{
    private $db;
    
    public function __construct()
    {
        self::$db = new DataBase();
    }
    
    public function insert($post_id, $name, $email, $date, $content)
    {
        $query = "INSERT INTO comments (post_id, name, email, content, date) VALUES ('%post_id%', '%name%', '%email%', '%content%', '%date%')";
        $param = array(
            "post_id" => $post_id,
            "name"    => $name,
            "email"   => $email,
            "date"    => $date,
            "content" => htmlspecialchars($content)
        );
        return self::$db->query($query, $param);
    }
    
    public function get($post_id, $id = null)
    {
        $query = "SELECT * comments WHERE post_id = '%post_id%'";
        if ($id != null) {
            $param = array("post_id" => $post_id);
        } else {
            $query .= " AND id = '%id%'";
            $param["id"] = $id;
        }
        $query .= " ORDER BY date DESC, id DESC";
        return self::$db->query($query, $param);
    }
}