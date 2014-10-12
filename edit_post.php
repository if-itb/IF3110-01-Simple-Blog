<?php include ('header.php');?>
<script type="text/javascript">
	appendTitle("Edit Post");
</script>

<?php
	$pid = $_GET['pid'];
	$mysql = mysql_connect("localhost","root","");
	if(!$mysql)
		die('DB Ngga bisa dibuka' . mysql_error());
	mysql_select_db("simple_blog", $mysql);
	$sql = "SELECT * FROM `sb_post` WHERE `sb_post`.`post_id` = " . $pid;
	$post_resource = mysql_query($sql);
	$post = mysql_fetch_array($post_resource);
	mysql_close($mysql);
	$title = $post['post_title'];
	$content = str_replace("<br />", "",$post['post_content']);
	if($post['is_featured'])
		$featured = 'true';
	else
		$featured = 'false';
?>

<article class="art simple post">
	<h2 class="art-title" style="margin-bottom:40px">-</h2>
	<div class="art-body">
		<div class="art-body-inner">
			<h2>Edit Post</h2>
			<div id="contact-area">
				<form name="formPost" id="formPost" method="post" action="exec_edit_post.php" onsubmit="return validateForm();">
					<label for="Judul">Judul:</label>
					<input type="text" name="Judul" id="Judul" required value="<?php echo $title;?>" />

					<label for="Tanggal">Tanggal:</label>
	                <input type="text" name="Tanggal" id="Tanggal" value="<?php echo date("d/m/Y"); ?>" placeholder="DD/MM/YYYY" pattern="[0-3][0-9][/][0-1][0-9][/][0-9]+" required/>
	                    
	                <label for="Konten">Konten:</label><br />
	                <textarea name="Konten" rows="20" cols="20" id="Konten" required><?php echo $content;?></textarea>

	                <input type="checkbox" name="Featured" id="Featured" style="margin-left:120px;width:20px;" checked="<?php echo $featured;?>">Featured</input><br />

	                <input type="submit" name="submit" id="submit" value="Simpan" class="submit-button"  />
	                <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>" />
				</form>
			</div>
		</div>
	</div>
</article>

<?php include('footer.php'); ?>


