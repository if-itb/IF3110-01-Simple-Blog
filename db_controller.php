<?php
	class DB {
		private $hostname = "localhost";
		private $username = "root";
		private $password = "password";
		private $dbname = "if3110-01-simple-blog";

		private $db;
		public function __construct() {
			// create database connection
			$this->db = mysqli_connect($this->hostname, $this->username, $this->password);
			if (!$this->db) {
				die("Tidak bisa terhubung ke database");
			}
			else {
				// create database if not exists
				$exist = mysqli_select_db($this->db, $this->dbname);
				if (!$exist) {
					$sql1 = "CREATE DATABASE IF NOT EXISTS `if3110-01-simple-blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";
					$sql2 = "USE `if3110-01-simple-blog`";
					$sql3 = "CREATE TABLE IF NOT EXISTS `comment` (`id` int(11) NOT NULL AUTO_INCREMENT, `post_id` int(11) NOT NULL, `nama` varchar(99) NOT NULL, `email` varchar(99) NOT NULL, `waktu` datetime NOT NULL, `komentar` text NOT NULL, PRIMARY KEY (`id`), KEY `post_id` (`post_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;";
					$sql4 = "CREATE TABLE IF NOT EXISTS `post` (`id` int(11) NOT NULL AUTO_INCREMENT, `judul` varchar(99) NOT NULL, `tanggal` date NOT NULL, `konten` text NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;";
					$sql5 = "ALTER TABLE `comment` ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
					if (!$this->db->query($sql1) || 
						!$this->db->query($sql2) ||
						!$this->db->query($sql3) ||
						!$this->db->query($sql4) ||
						!$this->db->query($sql5)) {
						die ("Database creation failed");
					}
					mysqli_select_db($this->db, $this->dbname);
				}
			}
		}

		public function __destruct() {
			mysqli_close($this->db);
		}

		public function getAllPosts() {
			$sql = "SELECT * FROM `post` ORDER BY `tanggal` DESC";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				die ("Terjadi kesalahan pada database. " . mysqli_error());
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
				die ("Terjadi kesalahan pada database. " . mysqli_error());
				return null;
			}
			return $query->fetch_assoc();
		}

		public function setPost($id, $judul, $tanggal, $konten) {
			$sql = "UPDATE `post` SET `judul`=\"" . addslashes($judul) . "\", `tanggal`=\"" . addslashes($tanggal) . "\", `konten`=\"" . addslashes($konten) . "\" WHERE `id` = " . $id;
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				die ("Terjadi kesalahan pada database. " . mysqli_error());
				return false;
			}
			return true;
		}

		public function post($judul, $tanggal, $konten) {
			$sql = "INSERT INTO `post` (`judul`, `tanggal`, `konten`) VALUES (\"" . addslashes($judul) . "\", \"" . addslashes($tanggal) ."\", \"" . addslashes($konten) . "\")";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				die ("Terjadi kesalahan pada database. " . mysqli_error());
				return null;
			}
			return mysqli_insert_id($this->db);
		}
		
		public function removePost($id) {
			$sql = "DELETE FROM `post` WHERE `id` = $id";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				die ("Terjadi kesalahan pada database. " . mysqli_error());
			}
		}

		public function getComments($post_id) {
			$sql = "SELECT * FROM `comment` WHERE `post_id` = $post_id ORDER BY `id` DESC;";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				die ("Terjadi kesalahan pada database. " . mysqli_error());
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
				die ("Terjadi kesalahan pada database. " . mysqli_error());
				return null;
			}
			$id = mysqli_insert_id($this->db);
			$sql = "SELECT `waktu` FROM `comment` WHERE `id`=$id";
			$query = mysqli_query($this->db, $sql);
			if (!$query) {
				die ("Terjadi kesalahan pada database. " . mysqli_error());
				return null;
			}
			$row = $query->fetch_assoc();
			if (!$row) {
				die ("Terjadi kesalahan pada database. " . mysqli_error());
				return null;
			}
			return array("post_id" => $post_id, "nama" => $nama, "email" => $email, "waktu" => $row["waktu"], "komentar" => $komentar);
		}
	}
?>
