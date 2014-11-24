<!DOCTYPE html>
<html>
<head>
<title>processing</title>
</head>
<body>
<?php
	include 'functions.php';
	if(isset($_GET['id'])|isset($_POST['id'])){
		if(isset($_POST['id']))
		{
			$success = deletepost($_POST['id']);
			$success = updatedb($_POST['Judul'],$_POST['Tanggal'],$_POST['Konten']);
			if($success)
			{
				header("location:index.php");
			}
			else
			{
				header("location:new_post.php");
			}
		}
		else
		{
			$success = deletepost($_GET['id']);
		}
		if($success){
			header("location:index.php");
		}
		else
		{
			echo "Unsuccessful";
		}
	}
	else
	{
		$success = updatedb($_POST['Judul'],$_POST['Tanggal'],$_POST['Konten']);
		if($success)
		{
			header("location:index.php");
		}
		else
		{
			header("location:new_post.php");
		}
	}	
?>
</body>
</html>