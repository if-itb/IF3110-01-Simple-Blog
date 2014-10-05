<?php 
	$con = mysqli_connect('localhost', 'root', '', 'simple_blog');
	
	$judul = mysqli_real_escape_string($con, $_POST['Judul']);
	$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
	$konten = mysqli_real_escape_string($con, $_POST['Konten']);
	echo "Judul: ",$judul, "<br>";
	echo "Tanggal : ",$tanggal, "<br>";
	echo "Konten: ",$konten, "<br>";
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL <br>";
	}
	else 
	{
		$query = "INSERT INTO `simple_blog`.`info_post` (`id`, `judul`, `tanggal`, `konten`) 
				  VALUES (NULL, '$judul', '$tanggal', '$konten');";
					
		if (!mysqli_query($con,$query)) 
		{
			die('Error: ' . mysqli_error($con));
		}
		echo "1 record added";
	}
	
	mysqli_close($con);
 ?>