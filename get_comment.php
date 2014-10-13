<?php
	require "db.php";

	if (isset($_GET['post_id'])){
		$comments = getComments($_GET['post_id']);
		foreach ($comments as $comment):
?>

	<li class='art-list-item'>
        <div class='art-list-item-title-and-time'>
            <h2 class='art-list-title'><?=$comment['nama'];?></h2>
            <div class='art-list-time'><?=$comment['created_at'];?></div>
        </div>
        <p><?=$comment['komentar'];?></p>
    </li>


<?php endforeach; } ?>	