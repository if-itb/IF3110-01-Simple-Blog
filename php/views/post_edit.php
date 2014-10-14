<?php

	require 'php/crud/post.php';
	require 'php/lib/url.php';
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$post = mysqli_fetch_assoc(post_select($id));
	} else {
		$post = FALSE;
	}
	
?>

<?php require 'php/templates/top.php' ?>

<?php require 'php/templates/navbar.php' ?>

<section class="section-edit">

	<h1><?php echo $post ? "Edit '{$post['title']}'" : "New Post" ?></h1>
	<p>You can use <a href="http://dillinger.io/">Markdown</a> to aid with the HTML tags.</p>
	<form name="post-create" onsubmit="return validate_create()" action="<?php echo $post ? url('php/action/edit_post.php') : url('php/action/add_post.php') ?>" method="post">
		<input type="text" name="title" placeholder="Title" value="<?php echo $post ? $post['title'] : '' ?>" required>
		<input type="date" name="date" placeholder="Date" value="<?php echo $post ? $post['date'] : date('Y-m-d') ?>" required>
		<textarea name="content" placeholder="Content" required><?php echo $post ? $post['content'] : '' ?></textarea>
		<?php if ($post) { ?><input type="hidden" name="id" value="<?php echo $id ?>"><?php } ?>
		<p id="message-datenotvalid" class="edit-message edit-hidden">Please insert today's date (<?php echo date("Y-m-d") ?>) or newer (e.g. <a href="http://www.october212015.com/">October 21, 2015</a>).</p>
		<button type="submit">Submit</button>
	</form>
</section>

<?php require 'php/templates/bottom.php' ?>