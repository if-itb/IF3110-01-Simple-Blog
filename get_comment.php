<?php
extract($_GET);

// Connect to DB  
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_simpleblog";
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

// Check connection
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: ". mysqli_connect_error();
}

// Fetch post from DB
$query = "SELECT * FROM komentar WHERE post_id='$id'";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result))
{
	$time = strtotime($row['tanggal']);
	$date = date("d M y | H:i", $time);
	echo '<li class="art-list-item">';
	    echo '<div class="art-list-item-title-and-time">';
	        echo '<h2 class="art-list-title"><a href="mailto:'.$row['email'].'">'.$row['nama'].'</a></h2>';
	        echo '<div class="art-list-time">'.$date.'</div>';
	    echo '</div>';
	    echo '<p>'.$row['komentar'].'</p>';
	echo '</li>';
}

mysqli_close($conn);
?>