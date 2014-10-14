<?php
	require "db_handler.php";

	if (isset($_GET['post_id'])){
		$comments = getComments($_GET['post_id']);
		foreach ($comments as $comment):
?>

	<li class='art-list-item'>
        <div class='art-list-item-title-and-time'>
            <h2 class='art-list-title'><?=$comment['name'];?></h2>
            <div class='art-list-time'><?=$comment['comment_last_date'];?></div>
        </div>
        <p><?=$comment['post_comment'];?></p>
    </li>


<?php endforeach; } ?>	