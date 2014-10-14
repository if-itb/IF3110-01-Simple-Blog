<html>
<body>

<?php
require("connect_database.php");
$judulBaru = $_POST["Judul"];
$tanggalBaru = $_POST["Tanggal"];
$kontenBaru = $_POST["Konten"];
mysqli_query($con, "INSERT INTO post (`judul`, `tanggal`, `konten`) VALUES ('$judulBaru', '$tanggalBaru', '$kontenBaru')");
header("location:index.php");
?>

</body>
</html>