<!DOCTYPE HTML>
<HTML>
	<head>
		<title> Simple Blog </title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../CSS/mystyle.css">
		
		<!--Header Part of the blog-->
		<div class="header">
			<h1> Simple Blog </h1> 
			<ul>
				<li> <a href="../VIEW/home.php" id="link"> HOME </a> </li>
			</ul>
		</div>
		<div class="identity">
			Jan Wira Gotama Putra | 13512015
		</div>
		<hr id="strongLine">
		
		<!--Body Part of the blog-->
		<!-- Script -->
		<script src="../JS/validatePost.js"> </script>
		<div class="form">
			<form class="importantForm" name="editPost" action="../PHP/savePost.php" onsubmit="return validateForm()" method="POST">
				<?php 
					require_once('../PHP/edit.php');
				?>
				<br>
				<input type="submit" value="Save"> </input>
			</form>
		</div>
	</body>
</HTML>