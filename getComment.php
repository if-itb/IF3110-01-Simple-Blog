<?php 

	//get data from info_comment
	$link = mysqli_connect('localhost:3306', 'root', "", 'simpleblog');	
	$pid = mysqli_real_escape_string($link, $_GET['pid']);
	$query = "SELECT * FROM komentar WHERE pid = $pid ORDER BY c_date DESC";

	if(!($results = mysqli_query($link, $query)))
	{
		die('Error ' + mysqli_errno($link));
	}
	
	foreach ($results as $row)
	{
?>
	<li class="art-list-item">
		<div class="art-list-item-title-and-time">
			<h2 class="art-list-title"><?php echo $row['c_name']; ?></h2>
			<?php
				//formatting tanggal
				$date = date_create($row['c_date']);
			 ?>
			<div class="art-list-time"><?php echo date_format($date, 'g:ia \o\n l jS F Y'); ?></div>
		</div>
		<p><?php echo $row['comment']; ?></p>
	</li>
<?php 
	} 
	mysqli_close($link);
?>