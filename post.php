<?php include('header.php');
	include('function.php');
	$pid = $_GET["pid"];
	$mysql = mysql_connect("localhost","root","");
	if(!$mysql)
		die('DB Ngga bisa dibuka : ' . mysql_error());
	mysql_select_db("simple_blog", $mysql);
	$sql = "SELECT * FROM `sb_post` WHERE `sb_post`.`post_id`=$pid";
	$post_resource = mysql_query($sql);
	$post = mysql_fetch_array($post_resource);
	$comments = mysql_query("SELECT * FROM `sb_comments` WHERE `sb_comments`.`post_id`=$pid ORDER BY `comment_last_date` DESC");
	mysql_close($mysql);
?>
<script type="text/javascript">
	appendTitle("Post");
</script>

<article class="art simple post">
	<header class="art-header">
		<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
			<time class="art-time">
				<?php echo dbDatetoCalendar($post['post_date']); ?>
			</time>
			<h2 class="art-title">
				<?php echo $post['post_title'] ?>
			</h2>
			<p class="art-subtitle"></p>
		</div>
	</header>
	<div class="art-body">
		<div class="art-body-inner">
			<?php if($post['is_featured'] == 1)
				echo '<hr class="featured-article" />';
				else
					echo '<hr />';
				?>
			<p>
				<?php echo $post['post_content']; ?>
			</p>
			<hr />
			<h2>Komentar</h2>
			<div id="contact-area">
				<form method="post" onsubmit="myFunction(<?php echo $pid;?>); return false;">
					<label for="Nama">Nama:</label>
					<input type="text" name="Nama" id="Nama" required pattern="[a-zA-Z_]{1,12}" placeholder="max 12 dan hanya boleh alphabet dan slash('_')" />

					<label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" pattern="[a-zA-Z0-9_\.\+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-\.]+" required>
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar" required></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button" >
				</form>
			</div>
			<ul class="art-list-body" id="daftarKomentar" name="daftarKomentar">
				<?php
				while($row = mysql_fetch_array($comments))
				{
					echo '<li class="art-list-item">';
						echo '<div class="art-list-item-title-and-time">';
							echo '<h2 class="art-list-title">';
								echo '<a href="#">';
									echo $row['name'];
								echo '</a>';
							echo '</h2>';
							echo '<div class="art-list-time">';
								$datetime = explode(" ",$row['comment_last_date']);
								$date = $datetime[0];
								$time = $datetime[1];
								echo 'posted at <br />' . $date . " " . $time;
							echo '</div>';
						echo '</div>';
						echo '<p>';
						echo $row['post_comment'];
						echo '</p>';
					echo '</li>';
				}
				?>
			</ul>
		</div>		
	</div>
</article>
<?php include('footer.php'); ?>