<?php
include 'mysql.php';
$idpost = $_GET['id'];

$delquery = "DELETE FROM post WHERE id_post = '".$idpost."' ";
$sql = $con->query($delquery);
?>

<script type="text/javascript">
alert("Post telah dihapus");
document.location = "index.php";
</script>