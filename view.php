<?php include ('koneksi.php'); 

 $query = mysql_query("select * from tblblog");
$no = 1;
while ($data = mysql_fetch_array($query)){
	echo "<br>";
	echo "$no<br>";
	echo "Judul : ".$data['judul']."<br>";
	echo "Tanggal :".$data['tanggal']."<br>";
	echo "Konten :".$data['konten']."<br>";	
	echo "<br>";
	$no++;
}
?>
