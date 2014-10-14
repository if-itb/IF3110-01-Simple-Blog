<?php

include 'connect.php';

if (!isset($_GET['Pid']) || empty($_GET['Pid']) || !is_numeric($_GET['Pid'])) {
	die("Invalid.");
}
else {
	$Pid = (int)$_GET['Pid'];
}

$result = mysql_query("SELECT * FROM post WHERE Pid='$Pid'") or print("Tidak bisa memilih post.<br />".$sql."<br />".mysql_error());

while ($row = mysql_fetch_array($result)) {
	$xjudul = stripslashes($row['judul']);
	$xtanggal = $row['tanggal'];
	$xkonten = stripcslashes($row['konten']);

	$xjudul = str_replace('"', '\'', $xjudul);
	$xkonten = str_replace('<br />', '', $xkonten);
}
?>

<form action='' method='post'>
	<input type='hidden' name='Pid' value='<?php echo $row['Pid'];?>'>

	<p><label>Judul</label><br />
	<input type='text' name='judul' value='<?php echo $row['judul'];?>'></p>

	<p><label>Konten</label><br />
	<textarea name='konten' cols='20' rows='20'><?php echo $row['konten'];?></textarea></p>

</form>