<?php
	class DB {
		private $hostname = "localhost";
		private $username = "root";
		private $password = "password";
		private $dbname = "if3110-01-simple-blog";

		private $db;
		private function error() {
			// post error or something understandable by users
		}
		public function __construct() {
			// create database connection
			$this->db = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
			if (!$this->db) {
				$this->error();
				die;
			}
		}

		public function getAllPosts() {
			$sql = "SELECT * FROM `post` ORDER BY `tanggal` DESC";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
				return null;
			}
			$result = array();
			while ($row = $query->fetch_assoc()) {
				array_push($result, $row);
			}
			return $result;
		}

		public function getPost($id) {
			$sql = "SELECT * FROM `post` WHERE `id` = $id";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
				return null;
			}
			return $query->fetch_assoc();
		}

		public function setPost($id, $judul, $tanggal, $konten) {
			$sql = "UPDATE `post` SET `judul`=\"" . addslashes($judul) . "\", `tanggal`=\"" . addslashes($tanggal) . "\", `konten`=\"" . addslashes($konten) . "\" WHERE `id` = " . $id;
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
				return false;
			}
			return true;
		}

		public function post($judul, $tanggal, $konten) {
			$sql = "INSERT INTO `post` (`judul`, `tanggal`, `konten`) VALUES (\"" . addslashes($judul) . "\", \"" . addslashes($tanggal) ."\", \"" . addslashes($konten) . "\")";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
				return null;
			}
			return mysqli_insert_id($this->db);
		}
		
		public function removePost($id) {
			$sql = "DELETE FROM `post` WHERE `id` = $id";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
			}
		}

		public function getComments($post_id) {
			$sql = "SELECT * FROM `comment` WHERE `post_id` = $post_id ORDER BY `id` DESC;";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
				return null;
			}
			$result = array();
			while ($row = $query->fetch_assoc()) {
				array_push($result, $row);
			}
			return $result;
		}

		public function comment($post_id, $nama, $email, $komentar) {
			$sql = "INSERT INTO `comment` (`post_id`, `nama`, `email`, `waktu`, `komentar`) VALUES (\"" . addslashes($post_id) . "\", \"" . addslashes($nama) . "\", \"" . addslashes($email) . "\", NOW(), \"" . addslashes($komentar) . "\");";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
				return null;
			}
			$id = mysqli_insert_id($this->db);
			$sql = "SELECT `waktu` FROM `comment` WHERE `id`=$id";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				$this->error();
				return null;
			}
			$row = $query->fetch_assoc();
			if (!$row) {
				$this->error();
				return null;
			}
			return array("post_id" => $post_id, "nama" => $nama, "email" => $email, "waktu" => $row["waktu"], "komentar" => $komentar);
		}
	}
?>
