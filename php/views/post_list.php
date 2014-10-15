<?php
	require_once "php/crud/post.php";
	require_once "php/lib/url.php";
	
	$posts = post_select();
?>

<?php require "php/templates/top.php" ?>
<?php require "php/templates/navbar.php" ?>

<section class="section-list">
	<?php if (mysqli_num_rows($posts) > 0) { ?>
		
		<?php $i = 0; while ($post = mysqli_fetch_assoc($posts)) { ?>
			<article>
				<header>
					<h1><a href="<?php echo url_view_post($post["id"]) ?>"><?php echo $post["title"] ?></a></h1>
					<div class="article-date"><?php echo date("l, j F Y", strtotime($post["date"])) ?></div>
				</header>
				<section>
					<?php echo html_entity_decode($post["content"]) ?>
				</section>
				<footer>
					<ul class="actions">
						<li><a href="<?php echo url_view_post($post["id"]) ?>">View</a></li>
						<li><a href="<?php echo url_edit_post($post["id"]) ?>">Edit</a></li>
						<li><a href="<?php echo url_delete_post($post["id"]) ?>" onclick="return confirm_delete()">Delete</a></li>
					</ul>
				</footer>
			</article>
		<?php $i++; } ?>
		
	<?php } else { ?>
		<h1>No posts available.</h1>
		<p>The blog is currently empty.</p>
	<?php } ?>
</section>

<?php require "php/templates/bottom.php" ?>