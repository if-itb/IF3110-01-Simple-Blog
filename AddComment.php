<?php 
    $con=mysqli_connect("localhost","root","","simpleblog");
    if (mysqli_connect_errno()){
    	echo "Fail to connect to database";
    }
    if (isset($_GET["id"]) && isset($_GET["Nama"]) && isset($_GET["Email"]) && isset($_GET["Komentar"])){
    	$id=mysqli_real_escape_string($con,$_GET['id']);
        $nama=mysqli_real_escape_string($con,$_GET['Nama']);
    	$email=mysqli_real_escape_string($con,$_GET['Email']);
    	$komentar=mysqli_real_escape_string($con,$_GET['Komentar']);
        $tanggal=date("Y-m-d");
   	    $strSql= "insert into blogtablekomen (no_post,nama,email,komentar,tanggal) values ('$id','$nama','$email','$komentar','$tanggal')";  
        if (!mysqli_query($con,$strSql)) 
        {
            die('Error: ' . mysqli_error($con));
        }      
        $result=mysqli_query($con,"select * from blogtablekomen where no_post=$id");
        while ($row=mysqli_fetch_array($result)){
            echo "
            <li class='art-list-item'>
                <div class='art-list-item-title-and-time'>
                    <h2 class='art-list-title'><a href='#'>".$row['nama']."</a></h2>
                    <div class='art-list-time'>".$row['tanggal']."</div>
                </div>
                <p>".$row['komentar']."</p>
            </li>";      
        }
    }
    mysqli_close($con);
?>