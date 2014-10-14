<?php
	if(isset($_GET['id'])){
		$isedit=true;
	}
	$postid=$_GET['id'];
	$db=mysqli_connect("Localhost","root","","wbdsimpleblog");
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();}
	$newjudul=mysqli_real_escape_string($db, $_POST['Judul']);
	$newkonten=mysqli_real_escape_string($db, $_POST['Konten']);
	$newtanggal=$_POST['Tanggal'];
    if ($isedit)
	{	$sql = "update post set judul='$newjudul', tanggal='$newtanggal', konten='$newkonten'
		where pid=$postid";
	}
	else
	{	$sql = "INSERT INTO post (pid ,judul ,tanggal ,konten) VALUES (
		NULL , '$newjudul', '$newtanggal' , '$newkonten')";
	}
	if (!mysqli_query($db,$sql)) {
		die('Error: ' . mysqli_error($db));
	}
	if($isedit){
		mysqli_close($db);
		header('location:post.php?id='.$postid);
	}
	else{
		$tables=mysqli_query($db,"SELECT * FROM post ORDER BY pid DESC");
		if (!$tables) {
			// error di query nya
		}
		else {
			$post = $tables->fetch_assoc();
		}
		$postid=$post['pid'];
		mysqli_close($db);
		echo $postid;
		header('location:post.php?id='.$postid);
	}
?>
