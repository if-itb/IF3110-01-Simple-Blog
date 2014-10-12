<?php
	$name = $_GET['name'];
	$email = $_GET['email'];
	$comment = nl2br(str_replace('<', '&lt;', str_replace('>', '&gt;', $_GET['comment'])));
	$pid = $_GET['pid'];
	$date = date("d/m/y h:i:s");
	$mysql = mysql_connect("localhost","root","");
	if(!$mysql)
	{
		die('DB Ngga bisa dibuka : ' . mysql_error());
	}
	$qry = "INSERT INTO `simple_blog`.`sb_comments` (`post_id`, `name`, `email`, `post_comment`, `comment_last_date`) VALUES ('$pid', '$name', '$email', '$comment', CURRENT_TIMESTAMP);";
	mysql_query($qry);
	mysql_close($mysql);
	echo '<li class="art-list-item">';
		echo '<div class="art-list-item-title-and-time">';
			echo '<h2 class="art-list-title">';
				echo '<a href="#">';
					echo $name;
				echo '</a>';
			echo '</h2>';
			echo '<div class="art-list-time">';
				echo 'posted at <br />' . $date;
			echo '</div>';
		echo '</div>';
		echo '<p>';
		echo $comment;
		echo '</p>';
	echo '</li>';	
?>