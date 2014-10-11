<?php
	//Open connection to mysql
	$con=mysqli_connect("localhost","root","","simple_blog");
	//Error checking
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		$judul = mysqli_real_escape_string($con, $_POST['Judul']);
		$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
		$konten = mysqli_real_escape_string($con, $_POST['Konten']);
		if ($judul != '' && $tanggal != '' && $konten != '')
		{
			$sql = mysqli_query($con,"INSERT INTO post (judul,tanggal,konten) VALUES ('$judul', '$tanggal','$konten')");
		}
		mysqli_close($con);
		header('Location: new_post.html');
	}

?>