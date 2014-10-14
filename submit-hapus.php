<html>
<body>

<?php
require("connect_database.php");
$idHapus = $_REQUEST["id"];
mysqli_query($con, "DELETE FROM post WHERE id='$idHapus'");
header("location:index.php");
?>



</body>
</html>