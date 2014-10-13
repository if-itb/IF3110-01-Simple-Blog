<?php
    require_once(dirname(__FILE__)."/../module/database.php");
    class Post extends Database
    {
        private $tabel;

        public function Post()
        {
            $this->Database();
            $this->tabel = "post";
        }

        public function AddPost($data)
        {
            $action = $this->insert($this->tabel,$data);
            return $action;
        }

        public function GetAllPost()
        {
            $query = $this->query("SELECT * FROM $this->tabel ORDER by id DESC");
            return $query;
        }

        public function GetPost($id)
        {
            $query = $this->query("SELECT * FROM $this->tabel WHERE id = '$id'");
            $result = mysql_fetch_object($query);
            return $result;
        }

        public function EditPost($data,$id)
        {
            $action = $this->update($this->tabel,$data,"id = '$id'");
            return $action;
        }

        public function DelPost($id)
        {
            $action = $this->delete($this->tabel,"id = '$id'");
            return $action;
        }
    }
?>
