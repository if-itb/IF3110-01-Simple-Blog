<!DOCTYPE HTML>
<HTMl>
	<head>
		<title> Simple Blog </title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../CSS/mystyle.css">
		
		<!--Header Part of the blog-->
		<div class="header">
			<h1> Simple Blog </h1> 
			<ul>
				<li> <a href="../VIEW/newPost.html" id="link"> ADD NEW POST </a> </li>
			</ul>
		</div>
		<div class="identity">
			Jan Wira Gotama Putra | 13512015
		</div>
		<hr id="strongLine">
		
		<!--Body Part of the blog-->
		<script src="../JS/deletePost.js"> </script>
		<div class="body">
			<?php 
				require_once('../PHP/fetchPost.php'); //connects to database
			?>
			
		</div>
	</body>
</HTML>