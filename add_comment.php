<?php
//create connection
$con=mysqli_connect("localhost","root","asdasd123","blog");

//check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

$id_post = $_GET['id'];
$nama = mysqli_real_escape_string($con, $_GET['Nama']);
$email = mysqli_real_escape_string($con, $_GET['Email']);
$komentar = mysqli_real_escape_string($con, $_GET['Komentar']);
$waktu = date("Y-m-d");

//update table
mysqli_query($con, "INSERT INTO comment (nama, email, komentar, waktu, id_post) VALUES ('$nama', '$email', '$komentar', '$waktu', '$id_post')");

$result_komentar = mysqli_query($con, "SELECT * FROM comment WHERE id_post = '$id_post'");

while($row_komentar = mysqli_fetch_array($result_komentar)) {
                echo '<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php?id_post=' . $row_komentar['id_post'] . '">' . $row_komentar['nama'] . '</a></h2>
                        <div class="art-list-time"> '. $row_komentar['waktu'] .
                        '</div>
                    </div>
                    <p>' . $row_komentar['komentar'] . '</p>
                </li>';
}

mysqli_close($con);

?>