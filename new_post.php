<?php
	header("Location:index.php");
	$link = mysql_connect("localhost","root","");
	if (!$link){
		die("Not connected : ". mysql_error());
	} else{
		echo "berhasil konek ke localhost";
	}
	
	echo "\n";
	// Make my_db the current database

	$db_name = "my_db";
	$db_selected = mysql_select_db($db_name, $link);

	if (!$db_selected) {
	  	$sql_db = "CREATE DATABASE " .$db_name;
	  	if (mysql_query($sql_db,$link)){
	  		echo "Database ". $db_name ." created successfully\n";
	  	} else{
	  		echo "Error creating database: " . mysql_error($link);
	  	}
	}
	else {
	    echo "Error creating database: " . mysql_error($link);
	}

	mysql_close($link);

	echo "a a " . $db_name. " ";
	$db_link = mysqli_connect("localhost", "root", "", $db_name);
	
	if (!$db_link) {
	  die("Failed to connect to MySQL: " . mysql_error());
	}

	$sql_table = "CREATE TABLE Posting(
					ID INT NOT NULL AUTO_INCREMENT,
					PRIMARY KEY(ID),
					JUDUL VARCHAR(100),
					TANGGAL VARCHAR(30),
					KONTEN VARCHAR(8000)
				)";
		
	if (mysqli_query($db_link,$sql_table)){
		echo "Table persons created successfully";
	} else {
	  echo "Error creating table: " . mysqli_error($db_link);
	}


	//Insert data into table
	$judul = mysqli_real_escape_string($db_link,$_POST["Judul"]);
	$tanggal = mysqli_real_escape_string($db_link,$_POST["Tanggal"]);
	$konten = mysqli_real_escape_string($db_link,$_POST["Konten"]);

	$sqlinsert="INSERT INTO Posting(JUDUL, TANGGAL, KONTEN) VALUES('$judul','$tanggal','$konten')";
	if (!mysqli_query($db_link,$sqlinsert)) {
		die('Error: ' . mysqli_error($db_link));
	}
		echo "1 record added";
	mysqli_close($db_link);
	exit;
?>