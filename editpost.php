<!DOCTYPE html>
<html>
<head>
	<title>Baspram's Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="author" content="Bagaskara Pramudita">
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
		$con=mysqli_connect("localhost","root","","simpleblog");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} ?>
	<div id="topLogo"><a href="index.php"><img src="logo/bp.png"></a></div>
	<div id="topNav">
		<ul>
			<li class="title"><a href="index.php">SIMPLE BLOG</a></li>
			<li class="right"><a href="insertpost.php"><button class="button">&#43 TAMBAH POST</button></a></li>
		</ul>
	</div>
	<div id="FORM">
		<?php
		$result = mysqli_query($con,"SELECT * FROM posts WHERE post_id='$_GET[post_id]'");
		$post = mysqli_fetch_array($result);
		?>
		<div id="EDITPOSTS">
		<h1>Edit Post</h1>
			<form name="pos" method="post" onsubmit="return validate()" action="edit.php">
            <input type="hidden" id="id" name="id" value="<?php echo $post['post_id']; ?>">
            <label for="Judul">Judul</label>
            <input type="text" name="title" id="title" value="<?php echo $post['post_title']; ?>">
			<br>
            <label for="Tanggal">Tanggal</label>
            <input type="text" name="date" id="date" value="<?php echo $post['post_date']; ?>" placeholder="YYYY-MM-DD">
            <br>
            <label for="Konten">Konten</label><br>
            <textarea name="content" id="content" rows="10" cols="20" ><?php echo $post['post_content']; ?>	
            </textarea>
			<br>
            <input type="submit" name="submit" value="Simpan" class="button">
        </form>
		

	</div>

	</div>
	<?php
	mysqli_close($con);
	?>
	<script type="text/javascript">
	function validate(){
			var today = new Date(<?php echo time();?> *1000);
			var date = new Date(document.forms["pos"]["date"].value);
			date.setHours(23);
			date.setMinutes(59);
			date.setSeconds(59);
			var datebener = date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate();
			if (date >= today){
				document.forms["pos"]["date"].value = datebener;
				return true;
			}
			else{
				alert('Tanggal yang anda masukkan tidak valid, tolong ulangi');
				return false;	
			}
		}
	</script>
</body>
</html>
