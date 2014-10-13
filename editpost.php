<?php
	//Open connection to mysql
	$con=mysqli_connect("localhost","root","","simple_blog");
	//Error checking
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		$id = mysqli_real_escape_string($con, $_GET['id']);
		$judul = mysqli_real_escape_string($con, $_POST['Judul']);
		$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
		$konten = mysqli_real_escape_string($con, $_POST['Konten']);
		if ($judul != '' && $tanggal != '' && $konten != '')
		{
			$sql = mysqli_query($con,"UPDATE post SET judul='$judul',tanggal='$tanggal',konten='$konten' WHERE post_id='$id'");
		}
		mysqli_close($con);
		header('Location: index.php');
	}

?>