<?php
	class Post {
		private $pdo;
	   public function __construct() {
	       $this->pdo = new PDO("mysql:host=localhost;dbname=simple", "root", "");
	   }
	   public function get_post() {
	   		$query = $this->pdo->prepare('SELECT * FROM post WHERE `id`=:id');
	   		$query->execute(array('id' => $_GET['id']));
		   	$array = array();
			foreach ($query as $row)
				array_push($array, $row);
		
			if (count($array) > 0)
				$array = json_encode($array);
			else
				$array = '';
			
			return $array;
	   }
	   public function create_post() {
	   		$query = $this->pdo->prepare("INSERT INTO `post` (`judul`, `tanggal`, `konten`) values (:judul, :tanggal, :konten)");
	   		$query->execute(array('judul' => $_POST['judul'], 'tanggal' => $_POST['tanggal'], 'konten' => $_POST['konten']));
	   }
	   public function delete_post() {
	   		$query = $this->pdo->prepare("DELETE FROM post WHERE `id`=:id");
	   		$query->execute(array('id' => $_POST['id']));
	   		echo $_POST['id'];
	   }
	   public function edit_post() {
	   		$query = $this->pdo->prepare("UPDATE `post` set `judul`=:judul, `konten`=:konten, `tanggal`=:tanggal where `id`=:id");
	   		$query->execute(array('judul' => $_POST['judul'], 'konten' => $_POST['konten'], 'tanggal' => $_POST['tanggal'], 'id' => $_POST['id']));
	   }
	}

	$post = new Post();
	switch ($_GET["type"]) {
		case "get" :
			echo $post->get_post();
			break;
		case "create" :
			$post->create_post();
			echo "";
			break;
		case "delete" :
			$post->delete_post();
			echo "";
			break;
		case "edit" :
			$post->edit_post();
			echo "";
			break;
	}
?>