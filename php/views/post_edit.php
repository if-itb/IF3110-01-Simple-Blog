<?php
	require_once "php/crud/post.php";
	require_once "php/lib/url.php";
	
	$is_create = !isset($_GET["id"]);
	if ($is_create) {
		   $page_title = "New Post";
		  $form_action = url("php/action/add_post.php");
		  $title_value = "";
		   $date_value = date("Y-m-d");
		$content_value = "";
	} else {
		$id = $_GET["id"];
		$post = mysqli_fetch_assoc(post_select($id));
		
		   $page_title = "Edit &lsquo;{$post["title"]}&rsquo;";
		  $form_action = url("php/action/edit_post.php");
		  $title_value = $post["title"];
		   $date_value = $post["date"];
		$content_value = $post["content"];
	}
?>

<?php require "php/templates/top.php" ?>
<?php require "php/templates/navbar.php" ?>

<section class="section-edit">
	<h1><?php echo $page_title ?></h1>
	<p>You can use <a href="http://dillinger.io/">Markdown</a> to aid with the HTML tags.</p>
	<form name="post-create" action="<?php echo $form_action ?>" method="post" onsubmit="return validate_create()">
	
		<input type="text" name="title" placeholder="Title" value="<?php echo $title_value ?>" required>
		<input type="date" name="date"  placeholder="Date"  value="<?php echo $date_value ?>"  required>
		
		<textarea name="content" placeholder="Content" required><?php echo $content_value ?></textarea>
		
		<?php if (!$is_create) { ?>
			<input type="hidden" name="id" value="<?php echo $id ?>">
		<?php } ?>
		
		<p id="message-datenotvalid" class="edit-message edit-hidden">
			Please insert today's date (<?php echo date("Y-m-d") ?>) or newer (e.g. <a href="http://www.october212015.com/">October 21, 2015</a>).
		</p>
		
		<button type="submit">Submit</button>
	</form>
</section>

<?php require "php/templates/bottom.php" ?>