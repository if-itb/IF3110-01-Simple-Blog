<!DOCTYPE html>
<!--
Copyright (C) 2014 Dalva - dalva24.com
All Rights Reserved.
Hand-Coded in the Aestaria and Quadsitron.
-->

	<?php 
	
	$title = "List of Posts - Simple Blog by Dariel Valdano";
	$description = "List of Posts";
	$selectedID = 1;
	$current_url = "blog.localhost/index.php";
	
	$dbh = new PDO( "mysql:dbname=simpleblog;host=localhost", "simpleblog", "simpleblog" );
	
	if (isset($_POST["delete"])) {
		$delete = $dbh->prepare("DELETE FROM `simpleblog`.`posts` WHERE `posts`.`ID` = ?");
		$delete->bindParam(1, $_POST["delete"]);
		$delete->execute();
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
			<a class='menu' <?php if ($selectedID == 1) {echo 'id="selectedMenu" '; } ?>href='index.php'><div class='menu'>Articles</div><div class='desc'>List em all!</div></a>
			<a class='menu' <?php if ($selectedID == 2) {echo 'id="selectedMenu" '; } ?>href='editor.php'><div class='menu'>Editor</div><div class='desc'>Make a new post!</div></a>
			<div class='menuCenter'><div class='ridecon'></div></div>
			<a class='menu' <?php if ($selectedID == 3) {echo 'id="selectedMenu" '; } ?>href='view.php'><div class='menu'>View</div><div class='desc'>View a post</div></a>
			<a class='menu' <?php if ($selectedID == 4) {echo 'id="selectedMenu" '; } ?>href='http://dalva24.com'><div class='menu'>My Site</div><div class='desc'>Visit the original</div></a>
		</nav>
		<main>
			
			
<div class='content'>
	<div class='title'><h1 class='left'>A Simple Blog</h1></div>
	<p>
		A simple blog for IF3110 Assignment No. 1
	</p>
</div>
<div class='portocontainer'>
	
	<?php
		$list = $dbh->prepare("SELECT * FROM posts");
		$list->execute();
	?>
	
	<?php while($row = $list->fetch(PDO::FETCH_ASSOC)) : ?>
	<div class="item">
		<div class='detail'>
			<div class='title'><h1 class="right">&rightarrowtail;</h1></div>
			<p>
				<?php 
					echo $row['date'] . "<br/>";
					$countcomm = $dbh->prepare("SELECT count(ID) FROM comments where comments.PID = " . $row['ID']);
					$countcomm->execute();
					echo $countcomm->fetchColumn() . " comments<br/>";
				?>
				<a href=<?php echo "'editor.php?id=" . $row['ID'] . "'"; ?>>Edit</a> | 
				<a href='#' onclick=<?php echo "'delAsk(" . $row['ID'] . ")'"; ?>>Delete</a>
			</p>
		</div>
		<div class='desc'>
			<div class='title'><a href=<?php echo "'view.php?id=" . $row['ID'] . "'"; ?>><h1 class='left'><?php echo $row['title']; ?></h1></a></div>
			<p><?php echo nl2br($row['content']); ?></p>
		</div>
		<form class='hidden' action="index.php" method="post" id=<?php echo "'delForm" . $row['ID'] . "'"; ?>>
			<input class=hidden name='delete' value=<?php echo "'" . $row['ID'] . "'"; ?>>
		</form>
	</div>
	<?php endwhile; ?>
	
	<script>
		function delAsk(id) {
			var r = confirm("Are you sure you want to delete this post?");
			if (r === true) {
				document.getElementById("delForm" + id).submit();
			}
		}
	</script>
	
</div>
			
			<footer>
				Site Design and Code &copy; Dariel Valdano 2014. All rights reserved. This site are simplified and is using dalva24's template from <a href='http://dalva24.com'>Dalva24.com</a>
			</footer>
		</main>
	</div>
	<div id="pagefader"></div>
	<script src="/res/dalva.js"></script>
</body>
</html>
