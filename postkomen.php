<?php
	$Nama = mysql_real_escape_string($_GET['name']);
	$Email = mysql_real_escape_string($_GET['email']);
	$Komen = mysql_real_escape_string($_GET['komentar']);
	$IdP = mysql_real_escape_string($_GET['idpost']);
	date_default_timezone_set('Asia/Jakarta');
	$Dat = date("Y-m-d h:i:s");

	$con=mysqli_connect("localhost","root","","datapost");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .mysql_conneect_error();
	}
	$sql = "INSERT INTO komentar (idpost, Nama, Email, Komentar, date)
	VALUES ('$IdP', '$Nama', '$Email', '$Komen', '$Dat')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' .mysqli_error($con));
	}
	 echo 	'<li class="art-list-item">';
     echo        '<div class="art-list-item-title-and-time">';
     echo            '<h2 class="art-list-title"><a>'.$Nama.'</a></h2>';
     echo            '<div class="art-list-time">'.$Dat.'</div>';
     echo        '</div>';
     echo        '<p>'.$Komen.'</p>';
     echo       '</li>';

	mysqli_close($con);
?>
