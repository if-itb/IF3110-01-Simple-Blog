<?php
    require_once("../module/database.php");
    class Post extends Database()
    {
        private $table;

        public function Post()
        {
            $this->table = "post";
        }

        public function add($data)
        {

        }
    }
?>
