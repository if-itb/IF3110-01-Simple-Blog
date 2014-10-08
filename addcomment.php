<?php
	//creating connection to database
	$link = mysqli_connect('localhost', 'root', "", 'simple_blog');
	$nama = mysqli_escape_string($link, $_GET['nama']);
	$email = mysqli_escape_string($link, $_GET['email']);
	$id = mysqli_escape_string($link, $_GET['id']);
	$komentar = mysqli_escape_string($link, $_GET['komentar']);
	$tanggal = date("Y-m-d H:i:s");
	//echo $nama . "<br>" . $email . "<br>" . $id . "<br>" . $komentar . "<br>"; 
	
	//query for inserting data to database
	$query = "INSERT INTO `info_comment`(`ID`, `nama`, `tanggal`, `comment`, `email`) 
	VALUES ($id,'$nama','$tanggal','$komentar','$email')";
	
	//insert these data to database
	if(!mysqli_query($link, $query))
	{
		die('Error ' + mysqli_errno($link));
	}
	
	//tampilkan data ke screen
	$query = "SELECT * FROM info_comment WHERE id=$id ORDER BY tanggal DESC";
	if(!($results = mysqli_query($link, $query)))
	{
		die('Error ' + mysqli_errno($link));
	}
	
	foreach($results as $result)
	{
 ?>
	<li class="art-list-item">
		<div class="art-list-item-title-and-time">
			<h2 class="art-list-title"><?php echo $result['nama']; ?></h2>
			<div class="art-list-time"><?php echo $result['tanggal']; ?></div>
		</div>
		<p><?php echo $result['comment']; ?></p>
	</li>
<?php 
	} 
	mysqli_close($link);
?>