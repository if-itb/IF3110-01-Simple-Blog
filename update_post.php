<?php
	require("koneksi_mysql.php");
	
	$id = $_POST['ID'];
	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	
	$query = mysql_query("UPDATE tbl_posting SET judul = '$judul', tanggal = '$tanggal', konten = '$konten' WHERE id_post = '$id'", $connection) or die(mysql_error());
	
	if($query) { 
	?>
		<script language="javascript">
			alert("Data Berhasil Diubah");
			document.location="index.php";
		</script>
	<?php
	}
?> 