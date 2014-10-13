<?php
if(!isset($_GET['id'])){
	header('location:index.php');
}
$postid=$_GET['id'];
$db=mysqli_connect("Localhost","root","","wbdsimpleblog");
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
?>
<script type="text/javascript">
var r = confirm("Anda yakin mau menghapus post ini?");
if (r == true) {
	<?php $sql = "delete from post where pid=$postid";
	if (!mysqli_query($db,$sql)) {
		die('Error: ' . mysqli_error($db));
	}?>
} 	
else {
	alert("post tidak terhapus");
	<?php
	mysqli_close($db);
	?>
	window.location="index.php";
}
window.location="index.php";
</script>
