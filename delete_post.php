<?php 
	require 'database.php';
	$id = 0;

	if (!empty($_GET['id'])){
		$id = $_REQUEST['id'];
	}

	if (!empty($_POST)){
		$id = $_POST['id'];

		$pdo = Database::connect();
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "DELETE FROM post WHERE id = $id";
		$q = $pdo->prepare($query);
		$q->execute();
		Database::disconnect();
		header("Location: index.php");
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>DELETE POST</title>
 </head>
 <body>
 	<div>
 		<h2>
 			INGIN HAPUS POST?
 		</h2>
 		<p>Apakah anda yakin ingin menghapus post ini?</p>
 		<form method="post" action="delete_post.php">
 			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
 			<input type="submit" value="Joss"/>
 			<a href="index.php">Tidak</a>
 		</form>
 	</div>
 </body>
 </html>