<html>
<body>

Welcome <?php echo $_POST["name"]; ?> <br>
Your email addres is <?php echo $_POST["email"]; echo " "; ?>
<?php 
date_default_timezone_set("Asia/Jakarta");

$d=strtotime("2014-10-15 05:28:34.000000");
$d2=date("Y-m-d h:i:s"); 
$d3=strtotime($d2);

echo "<p>";
echo "tanggal tes "; echo $d; echo"<br>";
echo "tanggal sekarang "; echo $d2; echo "<br>";
echo "tanggal sekarang "; echo $d3; echo"<br>";
echo "selisih "; echo date_diff($d3,$d2);
echo "</p>";
?>

</body>
</html>
