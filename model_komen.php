<?php
	class Komen {
		private $pdo;
	   public function __construct() {
	       $this->pdo = new PDO("mysql:host=localhost;dbname=simple", "root", "");
	   }
	   public function get_komen() {
	   		$query = $this->pdo->prepare("SELECT * FROM komen WHERE `id`=:id and `waktu`>:timestamp");
	   		$query->execute(array('id' => $_POST['id'], 'timestamp' => $_POST['timestamp']));
		   	$array = array();
			foreach ($query as $row)
				array_push($array, $row);
		
			if (count($array) > 0)
				$array = json_encode($array);
			else
				$array = "";
			
			return $array;
	   }
	   public function create_komen() {
	   		$query = $this->pdo->prepare("INSERT INTO `komen` (`id`, `nama`, `email`, `komentar`) values (:id, :nama, :email, :komentar)");
	   		$query->execute(array('id' => $_POST['id'], 'nama' => $_POST['nama'], 'email' => $_POST['email'], 'komentar' => $_POST['komentar']));
	   }
	}

	$komen = new Komen();
	switch ($_GET["type"]) {
		case "get" :
			echo $komen->get_komen();
			break;
		case "create" :
			$komen->create_komen();
			break;
	}
?>
