<?php

include 'DBConfig.php';

$id = $_GET['id'];
if ($_GET['state']==1) {
    $komentar = mysql_query("select * from komentar where PID='$id'", $link);
 
    while($komen = mysql_fetch_array($komentar)) {
        echo "<li class=\"art-list-item\">";
            echo "<div class=\"art-list-item-title-and-time\">";
                echo "<h2 class=\"art-list-title\"><a href=\"".$komen['EMAIL']."\">".$komen['NAMA']."</a></h2>";
                echo "<div class=\"art-list-time\">".$komen['TANGGAL']."</div>";
            echo "</div>";            
            echo "<p>".$komen['KOMENTAR']."&hellip;</p>";
        echo"</li>";
    }
}
else if ($_GET['state']==2) {
    $Nama=$_GET['nama'];
    $Email=$_GET['email'];
    $Komentar=$_GET['komentar']; 
    $PID=$id;
    $Tanggal = date('Y-m-d');

    $query = mysql_query("INSERT INTO komentar (PID, NAMA, EMAIL, TANGGAL, KOMENTAR)
               VALUES ('$PID','$Nama','$Email', '$Tanggal', '$Komentar') ORDER BY TANGGAL");
    if ($query)
        echo "submitted"; 
}

mysql_close($link);

?>
