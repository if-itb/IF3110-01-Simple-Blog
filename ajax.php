<html>
<head>
<?php
	$con=mysqli_connect("localhost","root","","blog_posts");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// escape variables for security
	$id = $_POST['id'];
	$sql="SELECT * FROM comment WHERE comment_post_id = '$id'";

	if (!($result = mysqli_query($con,$sql))) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	$row = mysqli_fetch_array($result);
?>
</head>
<body>
	<li class="art-list-item">
        <div class="art-list-item-title-and-time">
            <h2 class="art-list-title"><a href='' id="ajaxnama"><?php echo $row['comment_name']; ?></a></h2>
                <div class="art-list-time" id="ajaxtanggal"><?php echo $row['comment_date']; ?></div>
        </div>
        <p><div id="ajaxkomentar"><?php echo $row['comment_content']; ?></div></p>
   </li>
</body>
</html>