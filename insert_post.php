<?php
	require("koneksi_mysql.php");
	
	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	
	$query = mysql_query("INSERT INTO tbl_posting(judul, tanggal, konten) VALUES('$judul', '$tanggal', '$konten')", $connection) or die(mysql_error());
	
	if($query) { 
	?>
		<script language="javascript">
			alert("Data Berhasil Disimpan");
			document.location="index.php";
		</script>
	<?php
	}
?> 