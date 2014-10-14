<?php

require_once "php/crud/comment.php";

$comments = comment_select($_GET["post_id"]);
if (mysqli_num_rows($comments) > 0) {
	while ($comment = mysqli_fetch_assoc($comments)) :
	?>
		<article class="comment">
			<header class="comment-header">
				<a class="comment-author" href="mailto:<?php echo $comment["email"] ?>"><?php echo $comment["name"] ?></a>
				<span class="comment-date"><?php echo date("l, j F Y", strtotime($comment["date"])) ?></span>
			</header>
			<section class="comment-content">
				<?php echo $comment["content"] ?>
			</section>
		</article>
	<?php
	endwhile;
} else {
	?>
		<p>No comments have been posted for this post.</p>
	<?php
}