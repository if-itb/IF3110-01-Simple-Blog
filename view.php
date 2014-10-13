<!DOCTYPE html>
<!--
Copyright (C) 2014 Dalva - dalva24.com
All Rights Reserved.
Hand-Coded in the Aestaria and Quadsitron.
-->

	<?php 
	
	$title = "View a Post - Simple Blog by Dariel Valdano";
	$description = "View a Posts";
	$selectedID = 3;
	$current_url = "blog.localhost/index.php";
	
	$title = "Error 404 - No post selected";
	$content = "\$_GET['id'] is missing. Go back to post list and select a post there.";
	
	$initialID = -1;
	
	if (isset($_GET['id'])) {
		$dbh = new PDO( "mysql:dbname=simpleblog;host=localhost", "simpleblog", "simpleblog" );
		$curContent = $dbh->prepare("SELECT * FROM posts WHERE ID=?");
		$curContent->bindParam(1, $_GET["id"]);
		$curContent->execute();
		$row = $curContent->fetch(PDO::FETCH_ASSOC);
		$title = $row['title'];
		$content = $row['content'];
		$description = $title;
		
		$curComments = $dbh->prepare("SELECT * FROM comments WHERE PID=?");
		$curComments->bindParam(1, $_GET["id"]);
		$curComments->execute();
		
		$initialID = $_GET["id"];
	}
	
	?>

<html lang="en">
<head>
	<!-- Technical Metadata -->
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="/img/ridecon.png?v=1">
	<link rel="stylesheet" type="text/css" href="/res/mainStyle.css"/>
	<link rel="stylesheet" type="text/css" href="/res/devFont.css"/>

	<!-- SEO and Social Metadata -->
	<title><?php echo $title;?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<link rel="author" href="https://plus.google.com/+DarielValdano"/>
	<meta property="fb:admins" content="100000437744017" />
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="<?php echo $title;?>"/>
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:image" content="http://dalva24.com/img/dalva24.png"/>
	<meta property="og:url" content="<?php echo $current_url; ?>">
	<meta property="og:locale" content="en_US" />
	<meta property="og:site_name" content="Dariel Valdano's Personal Website" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo $title;?>" />
	<meta name="twitter:description" content="<?php echo $description; ?>" />
	<meta name="twitter:image" content="http://dalva24.com/img/dalva24.png" />
	<meta name="twitter:url" content="<?php echo $current_url; ?>" />
</head>
<body onunload=''>
	<div class='center'>
		<nav>
			<a class='menu' <?php if ($selectedID == 1) {echo 'id="selectedMenu" '; } ?>href='index.php'><div class='menu'>Posts</div><div class='desc'>List em all!</div></a>
			<a class='menu' <?php if ($selectedID == 2) {echo 'id="selectedMenu" '; } ?>href='editor.php'><div class='menu'>Editor</div><div class='desc'>Make a new post!</div></a>
			<div class='menuCenter'><div class='ridecon'></div></div>
			<a class='menu' <?php if ($selectedID == 3) {echo 'id="selectedMenu" '; } ?>href='view.php'><div class='menu'>View</div><div class='desc'>View a post</div></a>
			<a class='menu' <?php if ($selectedID == 4) {echo 'id="selectedMenu" '; } ?>href='http://dalva24.com'><div class='menu'>My Site</div><div class='desc'>Visit the original</div></a>
		</nav>
		<main>
			
			
<div class='content'>
	<div class='title'><h1 class='left'><?php echo $title; ?></h1></div>
	<p><?php echo nl2br($content); ?></p>
</div>
			
<?php
$contentheight = "240px";
?>

<div style='height:<?php echo $contentheight ?>' class='content1'>
	<div class='title'><h1 class='left'>Comemnts</h1></div>
	Add your own comments or view other's comments
</div>
			
<div style='height:<?php echo $contentheight ?>' class='content3' >
	<div class='title'><h1 class='left'>Add a Comment</h1></div>
	<form id="mainForm" action="editor.php" method="post" enctype="multipart/form-data" onsubmit="checkdate(this)">
		<div class="entry" style="width:320px;"><div class="formtext" id="Name">Title</div><input id="TitleIn" name="title" type="text" /></div>
		<div class="entry" style="width:320px;"><div class="formtext" id="Date">Date</div><input id="DateIn" name="date" type="text"/></div>
		<div class="entry" style="width:100%"><div class="formtext" id="Message">Message</div><textarea style="height: 50px;" class="msg" name="content"></textarea></div>
		<input id="ID" name="id" type="hidden" value="<?php echo $initialID; ?>"/>
		<div class="button"><input id="submitButton" class="button" name="Submit" value="Submit" type="submit"/></div>
	</form>
</div>			

			
<?php if(isset($_GET["id"])) : ?>

<div class='portocontainer' style="clear:both;">
	
	<?php while($row = $curComments->fetch(PDO::FETCH_ASSOC)) : ?>
	<div class="item">
		<div class='detail'>
			<p>
				<?php echo $row['email'] . "<br /> " . $row['date']; ?>
				
			</p>
		</div>
		<div class='desc'>
			<div class='title'><h1 class='left'><?php echo "Comment by " . $row['name']; ?></h1></div>
			<p><?php echo nl2br($row['content']); ?></p>
	</div>
	<?php endwhile; ?>
	
</div>
	
<?php endif; ?>
			
			<footer>
				Site Design and Code &copy; Dariel Valdano 2014. All rights reserved. This site are simplified and is using dalva24's template from <a href='http://dalva24.com'>Dalva24.com</a>
			</footer>
		</main>
	</div>
	<div id="pagefader"></div>
	<script src="/res/dalva.js"></script>
</body>
</html>
