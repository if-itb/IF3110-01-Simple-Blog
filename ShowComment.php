<?php 
    $con=mysqli_connect("localhost","root","","simpleblog");
    if (mysqli_connect_errno()){
    	echo "Fail to connect to database";
    }
    if (isset($_GET["id"])){
    	$id=mysqli_real_escape_string($con,$_GET['id']);
        if (!mysqli_query($con,"select * from blogtablekomen where no_post=$id")){
            die ('Error : ' .mysqli_error($con));
        }
        $result=mysqli_query($con,"select * from blogtablekomen where no_post=$id");
        while ($row=mysqli_fetch_array($result)){
            echo "<li class='art-list-item'>
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