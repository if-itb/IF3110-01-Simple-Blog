<?php
	$con = mysqli_connect("localhost", "root", "", "wbd");
	$query = "SELECT * FROM comment WHERE post_id = ".$_POST['post-id'];
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	echo '<ul class="art-list-body">';
	while($record = mysqli_fetch_array($result)){
		echo '<li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.php">'.$record['name'].'</a></h2>
                    <div class="art-list-time">'.$record['date'].'</div>
                </div>
                <p>'.$record['content'].'&hellip;</p>
			</li>';
	}
	echo '</ul>';
?>
            
