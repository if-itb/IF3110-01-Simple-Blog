<?php
    require_once(dirname(__FILE__)."/../module/database.php");
    class Komentar extends Database
    {
        private $tabel;

        public function Komentar()
        {
            $this->Database();
            $this->tabel = "komentar";
        }

        public function AddKomen($data)
        {
            $action = $this->insert($this->tabel,$data);
            return $action;
        }

        public function GetKomen($id_post)
        {
            $query = $this->query("SELECT * FROM $this->tabel WHERE id_post = '$id_post' ORDER by time DESC");
            return $query;
        }
    }
?>
