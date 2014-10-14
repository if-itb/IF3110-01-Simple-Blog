<?php
$postid = intval($_GET['postid']);

$con = mysqli_connect('localhost','','abc123','my_db');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = $postid";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
 echo" <li class=\"art-list-item\">
                    <div class=\"art-list-item-title-and-time\">
                        <h2 class=\"art-list-title\"><a href=\"post.php\" id=\"namakomen\">$Nama</a></h2>
                        <div class=\"art-list-time\">2 menit lalu</div>
                    </div>
                    <p id=\"komen\">$Komentar</p>
                </li>"
}

mysqli_close($con);
?> 