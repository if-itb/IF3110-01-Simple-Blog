<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $dbname = 'posting';
  $connect = mysql_connect($host, $user, $pass) or die(mysql_error());
  $dbselect = mysql_select_db($dbname);
?>

<p>
<?php
    $query = mysql_query("SELECT * FROM `data-post`");
 
    $no = 1;
    while ($data = mysql_fetch_array($query)) {

            echo $no; 
           echo $data['judul']; 
           echo $data['tanggal'];
             echo $data['konten'];

        $no++;
    }
    ?>
</p>