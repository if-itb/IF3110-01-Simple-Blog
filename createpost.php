<?php 
	require 'database.php';

	if (!empty($_POST)) {
		
		$titleError = null;
		$contentError = null;
		$dteError = null;

		//insert post vlues
		$title = $_POST['title'];
		$content = $_POST['content'];
		$date = $_POST['date'];

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO post (title,content,created_at,updated_at) values('$title', '$content', '$date','')";
            $q = $pdo->prepare($sql);
            $q->execute();
            Database::disconnect();
            header("Location: index.php");
		
	}

 ?>

 
