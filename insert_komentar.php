<?php
	include('config.php');
	
	$waktu = date("d M Y");
	$postid = $_POST['id'];
	$nama = $_POST['nama'];
	$komentar = $_POST['komentar'];
	$email = $_POST['email'];

	if($nama!="" and $komentar!="") {
		$query = mysql_query("INSERT INTO `data-kom`(`post-id`, `nama`, `waktu`, `email`, `komentar`) VALUES ('$postid','$nama','$waktu','$email','$komentar')");
		if($query) {
			echo "<li class=\"art-list-item\">
                    <div class=\"art-list-item-title-and-time\">
                        <h2 class=\"art-list-title\"><a href=\"mailto:$email \">$nama</a></h2>
                        <div class=\"art-list-time\">$waktu</div>
                    </div>
                    <p>$komentar</p>
                </li>";

		} else {echo "input gagal";}
	} else {echo "data kosong";}
?>