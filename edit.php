<?php 
    $con=mysqli_connect("localhost","root","","simpleblog");
    if (mysqli_connect_errno()){
    	echo "Fail to connect to database";
    }
    if (isset($_POST["Judul"]) && isset($_POST["Tanggal"]) && isset($_POST["Konten"]) && isset($_GET['id'])){
    	$judul=mysqli_real_escape_string($con,$_POST['Judul']);
    	$tanggal=mysqli_real_escape_string($con,$_POST['Tanggal']);
    	$konten=mysqli_real_escape_string($con,$_POST['Konten']);
        $id=$_GET['id'];
   	    $strSql= "update blogtable set judul='$judul', tanggal='$tanggal', konten='$konten' where no_post='$id'";
    	if (!mysqli_query($con,$strSql)){
			header("Location:new_post.php");            
		}
		else{
			header("Location:index.php");            
		}
    }
    mysqli_close($con);
?>

