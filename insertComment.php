<?php
	$id_post = $_POST['id_post'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$komentar = $_POST['komentar'];
	
	$con = mysqli_connect("localhost","root","","if3110-tugas1");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	echo $id_post;
	echo $nama;
	echo $email;
	echo $komentar;
	$date = date("Y-m-d H:i:s");
	$x = "INSERT INTO komentar(id_post, nama, email, isi, tanggal_komentar) VALUES ('".$id_post."','".$nama."','".$email."','".$komentar."','".$date."')";
	echo "  ";
	echo $x;
	$result = mysqli_query($con, $x);
	mysqli_close($con);
	//header('Location: index.php');
?>