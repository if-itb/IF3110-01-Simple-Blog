
<?php
$con=mysqli_connect("localhost","root","","wbd");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();	
}

// escape variables for security
$Nama = mysqli_real_escape_string($con, $_GET['Nama']);
$Email = mysqli_real_escape_string($con, $_GET['Email']);
$Konten = mysqli_real_escape_string($con, $_GET['Konten']);
$PostID = mysqli_real_escape_string($con, $_GET['PostID']);
$Tanggal = date('Y-m-d');
$sql="INSERT INTO comment (Nama, Email, Konten, PostID, Tanggal)
VALUES ('$Nama', '$Email', '$Konten', '$PostID', '$Tanggal ')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
echo '<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="simpleblog.js">'.$Nama. '</a></h2>
                        <div class="art-list-time">'.$Tanggal.'</div>
                    </div>
                    <p>'.$Konten.'</p>
                </li>'
?>