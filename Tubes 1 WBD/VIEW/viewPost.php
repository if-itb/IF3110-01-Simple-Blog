<!DOCTYPE HTML>
<HTML>
	<head>
		<title> Simple Blog </title>
	</head>
	
	<!-- Script -->
	<script src="../JS/comment.js"> </script>
	
	<body onload="javascript:commentAjax()">
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
		
		<!--Post content-->
		<div class="postview">
			<?php require_once('../PHP/fetchView.php');
			?>
		</div>
		<hr id="strongLine">
		<!--Body Part of the blog-->
		<p> <b> COMMENTS </b> </p>
		<div class="commentList" id="commentList">
		
		</div>
		
		<hr id="strongLine">
		<div class="giveComment">
			<p> <b> LEAVE YOUR COMMENT HERE </b> </p>
			<form class="importantForm" name="commentForm" action="javascript:addComment()" onsubmit="return validateForm()" method="POST">
				<span class="formLabel"> Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </span> <input id="namePerson" name="namePerson" placeholder="Your name" type="text"> </input>
				<br>
				<span class="formLabel"> Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </span> <input id="email" name="email" placeholder="Email" type="text"> </input>
				<br>
				<div class="formLabel"> Comment : </div> <textarea id="comment" name="Comment"></textarea>
				<br>
				<input id="submit" type="submit" value="SUBMIT"> </input>
			</form>
		</div>
		
		<hr id="strongLine">
	</body>
</HTML>