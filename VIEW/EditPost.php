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
			 <a href="../VIEW/Home.php" id="link"> HOME </a> 
		</div>
		<div>
			&nbsp&nbsp&nbsp#73514701  Koji Sato
		</div>

		<div>

	<script src="../JS/ValidatePost.js"></script>

			<form class="Form" name="EditPost" action="../PHP/Update.php" onsubmit="return validateForm()" method="POST">
				<?php 
					require_once('../PHP/ShowEdit.php');
				?>
				<br><br>
				<input type="Submit" value="Save"> </input>
			</form>
		</div>
	</body>
</HTML>