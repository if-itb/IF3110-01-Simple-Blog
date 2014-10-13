<!DOCTYPE html>
<!--
Copyright (C) 2014 Dalva - dalva24.com
All Rights Reserved.
Hand-Coded in the Aestaria and Quadsitron.
-->

	<?php 
	
	$title = "Edit a Post - Simple Blog by Dariel Valdano";
	$description = "Edit a Post";
	$selectedID = 2;
	$current_url = "blog.localhost/editor.php";
	
	//$status = "new";
	$initialTitle = "";
	$initialContent = "";
	$initialID = -1;
	if (isset($_GET['id'])) {
		$dbh = new PDO( "mysql:dbname=simpleblog;host=localhost", "simpleblog", "simpleblog" );
		//$status = "editing";
		$curEdit = $dbh->prepare("SELECT * FROM posts WHERE ID=?");
		$curEdit->bindParam(1, $_GET["id"]);
		$curEdit->execute();
		$row = $curEdit->fetch(PDO::FETCH_ASSOC);
		$initialTitle = $row['title'];
		$initialContent = $row['content'];
		$initialID = $_GET['id'];
	}
	
	if (isset($_POST["title"]) && isset($_POST["date"]) && isset($_POST["content"]) && isset($_POST["id"])) {
		$dbh = new PDO( "mysql:dbname=simpleblog;host=localhost", "simpleblog", "simpleblog" );
		$initialTitle = $_POST["title"];
		$initialContent = $_POST["content"];
		if ($_POST["id"] == -1) {
			//$status = "posted";
			$create = $dbh->prepare("INSERT INTO `simpleblog`.`posts` (`ID`, `title`, `date`, `content`) VALUES (NULL, ?, ?, ?);");
			$create->bindParam(1, $_POST["title"]);
			$create->bindParam(2, $_POST["date"]);
			$create->bindParam(3, $_POST["content"]);
			$create->execute();
		} else {
			//$status = "updated";
			$update = $dbh->prepare("UPDATE `simpleblog`.`posts` SET `title` = :title, `date` = :date, `content` = :content WHERE `posts`.`ID` = :id;");
			$update->bindParam(':title', $_POST["title"]);
			$update->bindParam(':date', $_POST["date"]);
			$update->bindParam(':content', $_POST["content"]);
			$update->bindParam(':id', $_POST["id"]);
			$update->execute();
		}
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
			
<?php
$contentheight = "460px";
?>
<div style='height:<?php echo $contentheight ?>' class='content1'>
<div class='title'><h1 class='left'>Editor</h1></div>
Edit stuff here!
</div>
<div style='height:<?php echo $contentheight ?>' class='content3' >
	<div class='title'></div>
	<form id="mainForm" action="editor.php" method="post" enctype="multipart/form-data" onsubmit="checkdate(this)">
		<div class="entry" style="width:320px;"><div class="formtext" id="Name">Title</div><input id="TitleIn" name="title" type="text" value="<?php echo $initialTitle; ?>"/></div>
		<div class="entry" style="width:320px;"><div class="formtext" id="Date">Date</div><input id="DateIn" name="date" type="text"/></div>
		<div class="entry" style="width:100%;"><div class="formtext" id="Message">Message</div><textarea class="msg" name="content"><?php echo $initialContent; ?></textarea></div>
		<input id="ID" name="id" type="hidden" value="<?php echo $initialID; ?>"/>
		<div class="button"><input id="submitButton" class="button" name="Submit" value="Submit" type="submit"/></div>
	</form>
</div>
			
<script>
	//Autofill date
	var date = new Date();
	document.getElementById("DateIn").setAttribute("value", date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate());
	
	//validator
	function checkdate(input){
		var validformat=/^\d{4}-\d{2}-\d{2}$/; //Basic check for format validity
		alert("in " + input.date.value);
		var returnval=false;
		if (!validformat.test(input.date.value)) {
			alert("Invalid Date Format. Please correct and submit again.");
		} else { //Detailed check for valid date ranges
			var yearfield=input.date.value.split("-")[1];
			var monthfield=input.date.value.split("-")[2];
			var dayfield=input.date.value.split("-")[3];
			var enteredDate = new Date(yearfield, monthfield-1, dayfield);
			var today = new Date();
			if ((enteredDate.getMonth()+1!==monthfield)||(enteredDate.getDate()!==dayfield)||(enteredDate.getFullYear()!==yearfield)) {
				alert("Invalid Day, Month, or Year range detected. Please correct and submit again.");
			} else if (enteredDate < today) {
				alert("Invalid date: the entered date is earlier than today.");
			} else {
				returnval=true;
			}
		}
		return returnval;
	}

</script>
			
			<footer>
				Site Design and Code &copy; Dariel Valdano 2014. All rights reserved. This site are simplified and is using dalva24's template from <a href='http://dalva24.com'>Dalva24.com</a>
			</footer>
		</main>
	</div>
	<div id="pagefader"></div>
	<script src="/res/dalva.js"></script>
</body>
</html>
