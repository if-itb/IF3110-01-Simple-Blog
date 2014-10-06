<?php
// code will run if request through ajax
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="CRUD"; // Database name 
	$tbl_name="komentar"; // Table name 

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
  
  if (!empty($_POST['Nama']) AND !empty($_POST['Email']) AND !empty($_POST['Isi']) AND !empty($_POST['id'])) {
    // preventing sql injection
    $Nama = mysql_real_escape_string($_POST['Nama']);
    $Email = mysql_real_escape_string($_POST['Email']);
    $Isi = mysql_real_escape_string($_POST['Isi']);
    $id = mysql_real_escape_string($_POST['id']);

    // insert new comment into comment table
    mysql_query("
      INSERT INTO Komentar
      (Nama, Email, Isi, IDBlogPost)
      VALUES('{$Nama}', '{$Email}', '{$Isi}', '{$id}')");  
  }
?>
<!-- sending response with new comment and html markup-->
<div class="large-4 columns"><p><h5>
	<?php
		echo $Nama;
	?> </h5>
	<?php
		echo date('Y-m-d H:i:s');
	?> </p></div>
		<div class="large-8 columns"><p>
	<?php
		echo $Isi;
	?> <br> </div>
</div><hr>