<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/foundation.css" />
	<script type="text/javascript">
	<!--
		function ValidateCreate() {
			var today1 = new Date().getDate(),
			today2 = new Date().getMonth(),
			today3 = new Date().getFullYear(),
			idate1 = new Date(document.CreatePost.Tanggal.value).getDate(),
			idate2 = new Date(document.CreatePost.Tanggal.value).getMonth(),
			idate3 = new Date(document.CreatePost.Tanggal.value).getFullYear();
			if (today3 > idate3) {
				alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
				return false;
			} else if ((today3 == idate3) && (today2 > idate2)) {
				alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
				return false;
			} else if ((today2 == idate2) && (today1 > idate1)) {
				alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
				return false;
			}
		}
	-->
	</script>
</head>
 
<body>
	<?php
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="CRUD"; // Database name 
	$tbl_name="blogpost"; // Table name
	
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name WHERE IDBlogPost='$id'";
	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);
	?>
	<div class="row">
		<div class="large-12 columns">
		<h3>Update Post </h3>
		<hr>
		<br>
		</div>
	</div>
	<form name="CreatePost" action="updatepost.php" onsubmit="return ValidateCreate()" method="post">
		<div class="row">
			<div class="large-12 columns">
			<label>Judul</label>
			<input type="text" name="Judul" value="<?php echo $rows['Judul']; ?>"/>
			<br>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Tanggal</label>
				<input type="date" name="Tanggal" value="<?php echo $rows['Tanggal']; ?>"></textarea>
			</div>	
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Konten</label>
				<textarea name="Konten" rows="30"><?php echo $rows['Konten']; ?></textarea>
				<input name="id" type="hidden" value="<?php echo $rows['IDBlogPost']; ?>">
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="submit" class="small button">
			</div>
		</div>
</body>
</html>