<!DOCTYPE HTML>
<HTML>
	<head>
		<title> Simple Blog </title>
	</head>
	
	<script src="../JS/Comment.js"> </script>
	
	<body>
		<link rel="stylesheet" type="text/css" href="../CSS/mystyle.css">
		
		<!--Header Part of the blog-->
		<div class="header">
			<h1> Simple Blog </h1> 
			<a href="../VIEW/Home.php" id="link"> HOME </a>
		
		</div>
		<div>
			&nbsp&nbsp&nbsp#73514701   Koji Sato
		</div>
		<hr id="BordLine">
		
		<div class="CommentList" id="CommentList">
			<?php require_once('../PHP/FetchView.php');
			?>
		</div>
		<hr id="BordLine">
		
		<div class="GiveComment">
			<p> <b> Write Your Comment! </b> </p>
			<form class="" name="" action="javascript:addComment()" onsubmit="return validateForm()" method="POST">
				<span> Name : </span> <input id="Name" name="Name" placeholder="Your name" type="text"> </input>
				<br>
				<span> Email : </span> <input id="Email" name="Email" placeholder="Email" type="text"> </input>
				<br>
				<div> Comment : </div> <textarea id="Comment" name="Comment"></textarea>
				<br>
				<input type="Submit" value="SUBMIT"> </input>
			</form>
		</div>
		
		<p> <b> COMMENTS </b> </p>
		<div>
		
		</div>
	</body>
</HTML>