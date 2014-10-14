<?php



//create connection
$connect=mysqli_connect("localhost","root", "", "simple_blog");

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result =mysqli_query($connect, "SELECT * FROM posting WHERE ID=".$_GET['id']);
$row = mysqli_fetch_array($result);
	
if($row['Featured'])
{
	
	mysqli_query($connect, "UPDATE posting SET Featured='0' WHERE ID=".$_GET['id']." ");
	echo "grey";
}
else
{
	mysqli_query($connect, "UPDATE posting SET Featured='1' WHERE ID=".$_GET['id']." ");
	echo "red";
}




?>