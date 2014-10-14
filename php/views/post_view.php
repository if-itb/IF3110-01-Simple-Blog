<?php

	require 'php/crud/post.php';
	require 'php/lib/url.php';
	
	$id = $_GET['id'];
	$post = mysqli_fetch_assoc(post_select($id));
	$show_addpost = isset($_GET['add']);
	$show_editpost = isset($_GET['edit']);

?>

<?php require 'php/templates/top.php' ?>

<?php require 'php/templates/navbar.php' ?>

<section class="section-view">
	<?php if ($show_addpost) { ?>
		<div class="view-message" id="message-addpost">Post <b>"<?php echo $post['title'] ?>"</b> successfully added.</div>
	<?php } ?>
	<?php if ($show_editpost) { ?>
		<div class="view-message" id="message-editpost">Post <b>"<?php echo $post['title'] ?>"</b> successfully edited.</div>
	<?php } ?>
	<article>
		<div class="article-left">
			<h1><?php echo $post['title'] ?></h1>
			<div class="article-date"><?php echo date("l<b\\r>j F Y", strtotime($post['date'])) ?></div>
			<ul class="actions">
				<li><a href="<?php echo url_edit_post($post['id']) ?>">Edit Post</a></li>
				<li><a href="<?php echo url_delete_post($post['id']) ?>" onclick="return confirm_delete()" >Delete Post</a></li>
			</ul>
		</div>
		<div class="article-right">
			<?php echo html_entity_decode($post['content']) ?>
		</div>
	</article>
</section>

<?php require 'php/templates/bottom.php' ?>