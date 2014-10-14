<?php
	include('config.php');
?>

<?php
		$id = $_POST['id'];
        $judul = $_POST['Judul'];
        $tanggal = $_POST['Tanggal'];
        $konten = $_POST['Konten'];

        $query = mysql_query("UPDATE `data-post` SET `judul`='$judul',`tanggal`='$tanggal',`konten`= '$konten' WHERE `post-id`='$id'") or die(mysql_error());

        if ($query) {
 			include "index.php";
		}
?>