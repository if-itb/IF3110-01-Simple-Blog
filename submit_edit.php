<?php
	if(isset($_POST["submit"])){
		$con=mysqli_connect("localhost","root","","dbblog");
		if(mysqli_connect_errno()){
			echo "Gagal menghubungkan ke basis data blog";
		}
		
		$id = $_GET['ID'];
		$title = $_POST['Judul'];
		$date = $_POST['Tanggal'];
		$content = $_POST['Konten'];
		
		mysqli_query($con, "UPDATE post SET Judul='$title', Tanggal='$date', Konten='$content' WHERE ID='$id'");
		mysqli_close($con);
		
		header('Location: ' .'index.php');
	}
	else{
		header('Location: ' .'new_post.php');
	}
?>
