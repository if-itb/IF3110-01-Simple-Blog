<?php
	require ("sqlconnect.php");
	$IDpost = $_GET['IDPOST'];
	$nama = $_GET['Nama'];
	$email = $_GET['Email'];
	$komentar = $_GET['Komentar'];
	$commentinsert = "INSERT INTO listcomment(Nama,Komentar,ID,Email) VALUES('".$nama."','".$komentar."','".$IDpost."','".$email."')";
	if (!mysqli_query($con,$commentinsert)) {
		die ('Error: '. mysqli_error($con));
	}
	$lastId = mysqli_insert_id($con);
	$query = "SELECT * FROM listcomment WHERE IDcomment = " . $lastId;
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_array($result))
	{
		echo
		'<li class="art-list-item">
         <div class="art-list-item-title-and-time">
         <h2 class="art-list-title">'.$row['Nama'].'</h2>
         <div class="art-list-time">'.$row['Tanggal'].'</div>
         </div>
         <p>'.$row['Komentar'].'</p>
         </li>';
	}
	mysqli_close($con);
?>
	