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
	<a href="index.php"><div id="topLogo"><img src="logo/bp.png"></div></a>
	<div id="topNav">
		<ul>
			<li class="title"><a href="index.php">SIMPLE BLOG</a></li>
			<li class="right"><a href="insertpost.php"><button class="button">&#43 TAMBAH POST</button></a></li>
		</ul>
	</div>

	<div id="FORM">
		<div id="POST">
		<?php
		$result = mysqli_query($con,"SELECT * FROM posts WHERE post_id='$_GET[post_id]'");
		$post = mysqli_fetch_array($result);
		
		$string = strip_tags($post['post_title']);
		$newstring = wordwrap($string, 20, "<br>", false);?>
		<h1><?php echo $newstring; ?></h1>
		<h3><?php echo date('d-m-Y' ,strtotime($post['post_date'])); ?></h3>
		<p><?php echo nl2br($post['post_content']); ?></p>
		</div>
		<div id="POSTS">			
		<div id="comment_form">
		<h1>KOMENTAR</h1>
		<form name="komen" method="post" onsubmit="validate(); return false;">
					<input type="hidden" id="id" name="id" value="<?php echo $post['post_id']; ?>">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="nama" id="nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="email" id="email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="komentar" rows="10" cols="20" id="komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="button">
        </form>
        </div>
		<div id="comment_test">
        <?php
		$cresult = mysqli_query($con,"SELECT * FROM comments WHERE post_id='$_GET[post_id]' ORDER BY comment_id DESC ");
		while($comment = mysqli_fetch_array($cresult)) { ?>
		<div class="post">
			<div class="postleft">
				<!--<img src="img/purple">-->
				<h1> <?php echo $comment['comment_name']; ?></h1>
				<h4> <?php echo $comment['comment_email']; ?></h4>
				<p> <?php 
				date_default_timezone_set("Asia/Jakarta"); 
				$timekomen = strtotime($comment['comment_date']);
				$timesekarang = strtotime(date("H:i:s"));
				$diff = $timesekarang - $timekomen;
				/*echo date("H:i:s",$diff).'<br>';*/
				$parsed = date_parse(date("H:i:s",$diff));
				$seconds = $parsed['hour'] * 3600 - (7*3600) + $parsed['minute'] * 60 + $parsed['second'];
				/*echo date("H:i:s",$timekomen).'<br>';*/
				/*echo date("H:i:s",$timesekarang).'<br>';*/
				/*echo $seconds.'<br>'; */
				if ($seconds >= 60){
					$minutes = $seconds / 60;
					if ($minutes >= 60){
						$hours = $minutes / 60;
						if ($hours >= 24){
							$days = $hours / 24;
							echo intval($days)."&nbsp hari yang lalu";
						}
						else{
							echo intval($hours)."&nbsp jam yang lalu";
						}
					}
					else
					{
						echo intval($minutes)."&nbsp menit yang lalu";
					}
				}
				else{
					echo $seconds. "&nbsp detik yang lalu";
				}
				?>
			</p>
			</div>
			<div class="postright">
				<p><?php echo nl2br($comment['comment_content']); ?></p>
			</div>			
		</div>
		<?php } ?>
		</div>
		</div>
	</div>

	</div>
	<?php
	mysqli_close($con);
	?>
	<script>
		function validate(){
			var x = document.forms["komen"]["email"].value;
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    		if( re.test(x)){
				pos_komen();
			}
			else{
				alert('e-mail yang anda masukkan salah, tolong ulangi');
			}
		}
		function pos_komen(){
			var id = document.getElementById('id').value;
			var nama = document.getElementById('nama').value;
			var email = document.getElementById('email').value;
			var komentar = document.getElementById('komentar').value;
			document.getElementById('nama').value = "";
			document.getElementById('email').value = "";
			document.getElementById('komentar').value = "";
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					var respon = xmlhttp.responseText;
					if (respon == "true")
					{
						var append_komen;
						append_komen = "<div class='post'>";
						append_komen += "	<div class='postleft'>";
						append_komen += "		<h1>"+nama+" </h1>";
						append_komen += "		<h4>"+email+"</h4>";
						append_komen += "		<p> Barusan saja </p>";
						append_komen += "	</div>";
						append_komen += "	<div class='postright'>";
						append_komen += "		<p>"+komentar+"</p>";
						append_komen += "	</div>";
						append_komen += "</div>";
						var prev = document.getElementById("comment_test").innerHTML;
						document.getElementById("comment_test").innerHTML = append_komen + prev;
					}
					else
					{
						alert(respon);
					}
				}
			}
			xmlhttp.open("POST","comment.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("id="+id+"&nama="+nama+"&email="+email+"&komentar="+komentar);
			}

		
	</script>
</body>
</html>
