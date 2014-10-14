<?php
	require_once "php/crud/post.php";
	require_once "php/lib/url.php";
	
	$id = $_GET["id"];
	$post = mysqli_fetch_assoc(post_select($id));
?>

<?php require "php/templates/top.php" ?>
<?php require "php/templates/navbar.php" ?>

<section class="section-view">

	<?php if (isset($_GET["add"])) { ?>
		<div class="view-message" id="message-addpost">Post <b>"<?php echo $post["title"] ?>"</b> successfully added.</div>
	<?php } ?>
	<?php if (isset($_GET["edit"])) { ?>
		<div class="view-message" id="message-editpost">Post <b>"<?php echo $post["title"] ?>"</b> successfully edited.</div>
	<?php } ?>
	
	<article>
		<div class="article-left">
			<h1><?php echo $post["title"] ?></h1>
			<div class="article-date"><?php echo date("l<b\\r>j F Y", strtotime($post["date"])) ?></div>
			<ul class="actions">
				<li><a href="<?php echo url_edit_post($post["id"]) ?>">Edit Post</a></li>
				<li><a href="<?php echo url_delete_post($post["id"]) ?>" onclick="return confirm_delete()">Delete Post</a></li>
			</ul>
		</div>
		<div class="article-right">
			<?php echo html_entity_decode($post["content"]) ?>
			<div class="article-comments">
				<h2>Comments</h2>
				<div id="comments"></div>
			</div>
			<form name="comment" class="form-comment">
				<h2>Write a Comment</h2>
				<input type="text" name="name" placeholder="Name" required>
				<input type="email" name="email" placeholder="Email" required>
				<textarea name="content" placeholder="Content" required></textarea>
				<input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>">
				<input type="hidden" name="post_id" value="<?php echo $id ?>">
				<button type="submit">Submit</button>
			</form>
		</div>
	</article>
</section>
<script type="text/javascript" lang="javascript">
var url_load_comments = "<?php echo url_make_get(array("action" => "ajax_comments_list", "post_id" => $id)) ?>";
var url_add_comments = "<?php echo url_make_get(array("action" => "ajax_comment_add")) ?>";
</script>
<?php require "php/templates/bottom.php" ?>