<?php
	$postid=$_GET['id'];
	$db=mysqli_connect("Localhost","root","","wbdsimpleblog");
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();}
	$newnama=mysqli_real_escape_string($db, $_POST['Nama']);
	$newemail=mysqli_real_escape_string($db, $_POST['Email']);
	$newkonten=mysqli_real_escape_string($db, $_POST['Komentar']);
	$sql = "INSERT INTO comment (comid, pid, tglkomen, nama, email, komen) VALUES (
		NULL, $postid , CURRENT_TIMESTAMP, '$newnama', '$newemail', '$newkonten')";
	if (!mysqli_query($db,$sql)) {
		die('Error: ' . mysqli_error($db));
	}
	$comments=mysqli_query($db,"SELECT * FROM comment WHERE pid=".$postid." order by comid desc");
	if (!$comments) {
		// error di query nya	
	}
	else {
		$komen = $comments->fetch_assoc();
	}
	echo'
		<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title">'.$komen["nama"].'</h2>
				<div class="art-list-time">'.$komen["email"].'</div>
				<div class="art-list-time">'.$komen["tglkomen"].'</div>
			</div><div style="margin-left:230px;">'.$komen["komen"].'</div></li>';
	mysqli_close($db);
?>
