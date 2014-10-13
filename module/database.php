<?php
    class Database {
        private $host;
        private $user;
        private $pass;
        private $dbase;
        private $conn;
        private $select_db;

        public function Database()
        {
            $this->host    = "localhost";
            $this->user     = "root";
            $this->pass     = "underground";
            $this->dbase    = "wbd1";
        }

        public function open()
        {
            try
            {
                $this->conn = mysql_connect($this->host,$this->user,$this->pass);
                $this->select_db = mysql_select_db($this->dbase);
            }
            catch (exception $e)
            {
                return $e;
            }
        }

        public function close()
        {
            try
            {
                mysql_close($this->conn);
            }
            catch (exception $e)
            {
                return $e;
            }
        }

        public function query($q)
        {
            try
            {
                $this->open();
                $sql = mysql_query($q);
                $this->close();
                return $sql;
            }
            catch (exception $e)
            {
                return $e;
            }
        }

        public function insert($tabel,$data)
        {
            $col = "(";
            $count = count($data);
            $i = 1;
            while($element = current($data))
            {
                if ($i < $count)
                {
                    $col .= key($data).",";
                }
                else
                {
                    $col .= key($data).")";
                }
                next($data);
                $i++;
            }
            $value = "(";
            $i = 1;
            foreach($data as $val)
            {
                if ($i < $count)
                {
                    $value .= "'".mysql_real_escape_string($val)."',";
                }
                else
                {
                    $value .= "'".mysql_real_escape_string($val)."')";
                }
                $i++;
            }
            $query = "INSERT INTO ".$tabel." ".$col." VALUES ".$value;
            $action = $this->query($query);
            return $action;
        }

        public function update($tabel,$data,$where)
        {
            $set = "";
            $count = count($data);
            $i = 1;
            while($element = current($data))
            {
                if ($i < $count)
                {
                    $set .= key($data)."='".mysql_real_escape_string($element)."',";
                }
                else
                {
                    $set .= key($data)."='".mysql_real_escape_string($element)."'";
                }
                next($data);
                $i++;
            }
            $query = "UPDATE ".$tabel." SET ".$set." WHERE ".$where;
            $action = $this->query($query);
            return $action;
        }

        public function delete($tabel,$where)
        {
            $query = "DELETE FROM ".$tabel." WHERE ".$where;
            $action = $this->query($query);
            return $action;
        }
    }
?>
