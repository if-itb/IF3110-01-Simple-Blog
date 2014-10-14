<!DOCTYPE html>
<html>
<head>
	<title>Baspram's Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="author" content="Bagaskara Pramudita">
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.ico">
</head>
<body>
	<div id="topLogo"><a href="index.php"><img src="logo/bp.png"></a></div>
	<div id="topNav">
		<ul>
			<li class="title"><a href="index.php">SIMPLE BLOG</a></li>
			<li class="right"><a href="#l"><button class="button">&#43 TAMBAH POST</button></a></li>
		</ul>
	</div>
	<div id="FORM">
		<div id="EDITPOSTS">
		<h1>Tambah Post</h1>
			<form name="pos" method="post" onsubmit="return validate()" action="insert.php">
            <div><label for="Judul">Judul</label>
            <input type="text" name="title" id="title" placeholder="">
            </div>
			<br>
			<div>
            <label for="Tanggal">Tanggal</label>
            <input type="text" name="date" id="date" placeholder="YYYY-MM-DD">
            </div>
            <br>
            <div>
            <label for="Konten">Konten</label><br>
            <textarea name="content" id="content" rows="10" cols="20"></textarea>
			</div>
			<br>
            <input type="submit" name="submit" value="Simpan" class="button">
        </form>
		

	</div>

	</div>
	<script type="text/javascript">
		function validate(){
			var today = new Date(<?php echo time();?> *1000);
			var date = new Date(document.forms["pos"]["date"].value);
			date.setHours(23);
			date.setMinutes(59);
			date.setSeconds(59);
			var month = 1+parseInt(date.getMonth());
			var datebener = date.getFullYear()+"-"+month+"-"+date.getDate();
			var title = document.forms["pos"]["title"].value;
			if (title.length <= 50){
				if (date >= today){
					document.forms["pos"]["date"].value = datebener;
					return true;
				}
				else{
					alert('Tanggal yang anda masukkan tidak valid');
					return false;	
				}
			}
			else{
				alert('Judul lebih panjang dari 50 karakter');
				return false;
			}
		}
	</script>
</body>
</html>
