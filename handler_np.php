<?php 
    $con=mysqli_connect("localhost","root","","simpleblog");
    if (mysqli_connect_errno()){
    	echo "Fail to connect to database";
    }
    if (isset($_POST["Judul"]) && isset($_POST["Tanggal"]) && isset($_POST["Konten"])){
    	$judul=mysqli_real_escape_string($con,$_POST['Judul']);
    	$tanggal=mysqli_real_escape_string($con,$_POST['Tanggal']);
    	$konten=mysqli_real_escape_string($con,$_POST['Konten']);
   	    $strSql= "insert into blogtable(judul,tanggal,konten) values ('$judul','$tanggal','$konten')";        
    	if (!mysqli_query($con,$strSql)){
			header("Location:new_post.php"); 
		}
		else{
			header("Location:index.php");            
		}
    }
    mysqli_close($con);
?>