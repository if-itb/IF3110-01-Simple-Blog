<html>
<body>
<?php
$id = $_GET['id'];
echo $id;
header('Location: post.php?id='.$id);
// Create connection
	$con=mysqli_connect("localhost","root","","blog_posts");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$post_title = $_POST['Judul'];
	$post_content = $_POST['Konten'];
	echo $post_title;

	$sql="UPDATE post SET post_title = '$post_title', post_content = '$post_content' WHERE post_id = '$id'";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>

</body>
</html> 