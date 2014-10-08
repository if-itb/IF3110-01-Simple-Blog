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
				//Format tanggal date and time
				$date_now = date("Y-m-d H:i:s");
				$date_from_db = $row['tanggal'];
				$difference = $date_now - $date_from_db;
				echo 'date_now = ' . $date_now . "<br> date from db = " . $date_from_db;
				echo'<br><b>difference ='.$difference.'</b>';
			?>
			<div class="art-list-time"><?php echo $row['tanggal']; ?></div>
		</div>
		<p><?php echo $row['comment']; ?></p>
	</li>
<?php 
	} 
	mysqli_close($link);
?>