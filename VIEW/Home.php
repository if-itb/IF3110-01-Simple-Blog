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
			<a href="../VIEW/NewPost.html" id="link"> Add New Post </a>
		</div>

		<script src="../JS/DeletePost.js"></script>

		<div>
			&nbsp&nbsp&nbsp#73514701  Koji Sato
		</div>
		<hr id="BordLine">
	
		<div>
			<?php require_once("../PHP/FetchAllPosts.php") ?>
			
		</div>
	</body>
</HTML>