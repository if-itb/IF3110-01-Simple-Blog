<?php 

	//get data from info_comment
	$link = mysqli_connect('localhost', 'root', "", 'simple_blog');	
	$id = mysqli_real_escape_string($link, $_GET['id']);
	$query = "SELECT * FROM info_comment WHERE id = $id ORDER BY tanggal DESC";

	if(!($results = mysqli_query($link, $query)))
	{
		die('Error ' + mysqli_errno($link));
	}
	
	foreach ($results as $row)
	{
?>
	<li class="art-list-item">
		<div class="art-list-item-title-and-time">
			<h2 class="art-list-title"><?php echo $row['nama']; ?></h2>
			<?php
				//format output tanggal
				$retrieved = $row['tanggal'];
				$date = DateTime::createFromFormat('Y-m-d', $retrieved);
			 ?>
			<div class="art-list-time"><?php echo $date->format('l\, j F Y'); ?></div>
		</div>
		<p><?php echo $row['comment']; ?></p>
	</li>
<?php 
	} 
	mysqli_close($link);
?>