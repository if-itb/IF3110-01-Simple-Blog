<?php
include 'mysql.php';
$idpost = $_GET['id'];

$delquery = "DELETE post, comments FROM post JOIN comments ON post.id_post=comments.id_post WHERE post.id_post = '".$idpost."' ";
$sql = $con->query($delquery);
?>

<script type="text/javascript">
alert("Post telah dihapus");
document.location = "index.php";
</script>