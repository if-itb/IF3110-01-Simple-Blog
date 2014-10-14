<?php

// Create connection
$con=mysqli_connect("Localhost", "root","windy","blogwindy");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id_post = $_GET['id'];
$date = date("Y-m-d");

$nama = mysqli_real_escape_string($con, $_GET['Nama']);
$email = mysqli_real_escape_string($con, $_GET['Email']);
$komentar = mysqli_real_escape_string($con, $_GET['Komentar']);

mysqli_query($con, "INSERT INTO komentar (id_post, Nama, Tanggal, Komentar, Email)
	VALUES ('$id_post', '$nama', '$date', '$komentar', '$email')");

$hasilkomentar = mysqli_query($con,"SELECT * FROM komentar WHERE id_post='$id_post'");
while($row_komen = mysqli_fetch_array($hasilkomentar)){
   	echo '<li class="art-list-item">
	    	<div class="art-list-item-title-and-time">
            	<h2 class="art-list-title"><a href="post.php?id=' . $row_komen['id_post'] . '">' . $row_komen['Nama'] . '</a></h2>
                <div class="art-list-time">' . $row_komen['Tanggal'] . '</div>
            </div>
            <p>' . $row_komen['Komentar'] . '</p>
        </li>';
}            

//close the connection
mysqli_close($con);
?>