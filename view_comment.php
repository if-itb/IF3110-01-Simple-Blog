<?php
$postId = $_GET['id'];
$con=mysqli_connect("localhost","root","","simple_blog");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM comment WHERE post_id='$postId'");

while($row = mysqli_fetch_array($result)) {
	echo "<li class='art-list-item'>";
		echo "<div class='art-list-item-title-and-time'>";
			echo "<h2 class='art-list-title'><a href='post.html'>" . $row['name'] . "</a></h2>";
			echo "<div class='art-list-time'>" . date("d F Y",strtotime($row['date'])) . "</div>";
		echo "</div>";
		echo "<p>" . $row['content'] . "</p>";
	echo "</li>";
}
mysqli_close($con);	
?>