<?php

require_once dirname(__DIR__) . "/assists/database.php";

class post
{
    private static $db;
    
    public function __construct()
    {
        self::$db = new DataBase();
    }
        
    public function get_random_id()
    {
        $query = "SELECT RAND() * (SELECT MAX(id) FROM posts) AS id";
        $result = mysqli_fetch_assoc(self::$db->query($query, null));
        return floor($result["id"]);
    }
        
    public function insert($title, $date, $content)
    {
        $query = "INSERT INTO posts (title, date, content) VALUES ('%title%', '%date%', '%content%')";
        $param = array (
            "title"   => $title,
            "date"    => $date,
            "content" => htmlspecialchars($content)
        );
        return self::$db->query($query, $param);
    }
    
    public function get($id = null)
    {
        if ($id != null) {
            $query = "SELECT * FROM posts WHERE id = '%id%'";
            $param = array('id' => $id);
        } else {
            $query = "SELECT * FROM posts ORDER BY date DESC, id DESC";
            $param = array();
        }
        return self::$db->query($query, $param);
    }

    public function update($id, $title, $date, $content)
    {
        $query = "UPDATE posts SET title = '%title%', date = '%date%', content = '%content%' WHERE id = '%id%'";
        $param = array (
            "id"      => $id,
            "title"   => $title,
            "date"    => $date,
            "content" => htmlspecialchars($content)
        );
        return self::$db->query($query, $param);
    }
    
    function delete($id) {
        $query = "DELETE FROM posts WHERE id = '%id%'";
        $param = array("id" => $id);
        return self::$db->query($query, $param);
    }
}