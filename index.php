<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.css" />
	<script type="text/javascript">
	<!--
		function ValidateDelete() {
			var r = confirm("Apakah anda benar - benar ingin menghapus post ini?");
			if (r == true) {
				return true;
			} else {
				return false;
			}
	-->
	</script>
</head>
 
<body>
<div class="row">
	<div class="large-12 columns">
		<div class="large-10 columns">
        <h1>Simple Blog</h1> <br>
		<h5>by Muhammad Rizky W./13511037</h5>
		<br>
		</div>
		<br>
			<p><a href="php/create.php" class="small button"> Buat Post </a><br/> </p>
    </div>
	<hr>
</div>
	<div class="row">
		<div class="large-12 columns">
		<?php
		$host="localhost"; // Host name 
		$username="root"; // Mysql username 
		$password=""; // Mysql password 
		$db_name="CRUD"; // Database name 
		$tbl_name="blogpost"; // Table name 

		// Connect to server and select database.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
		$sql="SELECT * FROM $tbl_name ORDER BY IDBlogPost DESC";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result)){
		?> <div class="large-4 medium-8 columns"><p><h5>
		<?php
			echo $row['Judul'];
		?> </h5>
		<?php
			echo $row['Tanggal'];
		?> </p></div>
		<div class="large-8 columns"><p>
		<?php
			echo $row['Konten'];
		?> <br>
		<?php
			echo '<a class="btn" href="php/baca.php?id='.$row['IDBlogPost'].'">Baca </a>';
			echo '<a class="btn" href="php/update.php?id='.$row['IDBlogPost'].'">Edit </a>';
			echo '<a class="btn" onclick="return confirm(\'Are you sure?\');" href="php/delete.php?id='.$row['IDBlogPost'].'">Hapus </a>';
		?>
			</p></div><hr>
		<?php
		}
		?>
		</div>
	</div>
  </body>
</html>