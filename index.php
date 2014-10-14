<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="icon" type="image/png" href="Aang.png">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Just Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><img id="aang" src="Aang.png" /></a>
    <ul class="nav-primary">
        <div id="homediv">
        <li><a id="home">Home</a></li>
            
        <a href="new_post.php"><img id="addico" src="plus.png" /></a>
     </div>
    </ul>
    
</nav>
<?php
$con=mysqli_connect("localhost","root","","datapost");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .mysql_conneect_error();
	}
?>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php
			$result = mysqli_query($con,"SELECT * FROM postingan ORDER BY Tanggal DESC");
			while($row = mysqli_fetch_array($result)) {
            ?>
			<li class="art-list-item">
                <div class="art-list-item-title-and-time">
				<?php $IDp = $row['IDpost']?>
                    <h2 class="art-list-title"><a href="post.php?id=<?php echo $IDp?>"><?php echo $row['Judul'];?></a></h2>
                    <div class="art-list-time"><?php echo $row['Tanggal']?></div>
                </div>
                <p><?php echo $row['Konten']?><p>
                  <a href="mengedit.php?id=<?php echo $IDp?>">Edit</a> | <a onclick="Konfirmasi(<?php echo $IDp?>)" style="cursor:pointer">Hapus</a>
                </p>
            </li>
			<?php
			}
			mysqli_close($con);
			?>
          </ul>
        </nav>
    </div>
</div>

</div>
<script>
function Konfirmasi(x) {
    if (confirm("Yakin mau delete") == true) {
		window.location="delete_post.php?id="+x;
    } else {

    }
}
</script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>
