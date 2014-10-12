<?php include('header.php'); ?>

<div id="home">
	<div class="posts">
		<nav class="art-list">
			<ul class="art-list-body">
				<?php include('function.php');
				$mysql = mysql_connect("localhost","root","");
				if(!$mysql)
				{
					die('DB Ngga bisa dibuka : '.mysql_error());
				}
				//select db
				mysql_select_db("simple_blog", $mysql);
				//ambil table
				$posts = mysql_query("SELECT * FROM `sb_post` ORDER BY `sb_post`.`post_last_date` DESC");

				//menampilkan isi table
				while($row = mysql_fetch_array($posts))
				{
					echo '<li class="art-list-item">';
						echo '<div class="art-list-item-title-and-time">';
							echo '<h2 class="art-list-title">';
								echo '<a href="post.php?pid=' . $row['post_id'] .'">';
									echo $row['post_title'];
								echo '</a>';
							echo '</h2>';
							echo '<div class="art-list-time">';
								echo dbDatetoCalendar($row['post_date']);
							echo '</div>';
							if($row['is_featured'])
							{
								echo '<div class="art-list-time">';
									echo '<span style="color:#F40034;">&#10029;</span>';
									echo 'Featured';
								echo '</div>';
							}
						echo '</div>';
						echo '<p>';
						if(strlen($row['post_content']) > 300)
						{
							echo substr($row['post_content'], 0, 299);
							echo '<br />...<br /><a href="post.php?pid=' . $row['post_id'] .'">';
								echo 'Continue Reading';
							echo '</a>';
						}else{
							echo $row['post_content'];
						}
						echo '<br />';
							echo '<a href="edit_post.php?pid=' . $row['post_id'] . '">Edit</a> | <a href="exec_delete_post.php?pid=' . $row['post_id'] . '" onclick="return confirm(\'Apakah Anda yakin menghapus post ini?\');">Hapus</a>';
						echo '</p>';
					echo '</li>';
				}

				mysql_close($mysql);
				?>
			</ul>
		</nav>
	</div>
</div>

<?php include('footer.php'); ?>