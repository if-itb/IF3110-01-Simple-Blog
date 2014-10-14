<!DOCTYPE html>

<html>
<head>
	<?php
		$db=mysqli_connect("localhost","root","","simpleblog_db");
		mysqli_query($db,"UPDATE posts SET title='".$_POST['Judul']."', tanggal='".$_POST['Tanggal']."', body='".$_POST['Konten']."' WHERE id='".$_POST['ID']."'");
		
		#echo $_POST['Judul'];
		#echo $_POST['Tanggal'];
		#echo $_POST['Konten'];
		#echo $_POST['ID'];
		mysqli_close($db);
	?>

	<meta http-equiv="Refresh" content="0; url=index.php" />
</head>
<body>
	<p>Please follow <a href="index.php">this link if it's not automatically redirected</a>.</p>
</body>
</html>