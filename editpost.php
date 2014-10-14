<?php 
	require 'database.php';

	if (!empty($_POST)) {
		
		$titleError = null;
		$contentError = null;
		$dteError = null;

		//insert post vlues
		$id = $_POST['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$date = $_POST['date'];

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE post SET title='$title', content='$content', updated_at='$date' WHERE id='$id'";
            $q = $pdo->prepare($sql);
            $q->execute();
            Database::disconnect();
            header("Location: index.php");
		
	}

 ?>

 
