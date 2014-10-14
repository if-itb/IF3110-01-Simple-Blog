<?php
	$dbh = new PDO( "mysql:dbname=simpleblog;host=localhost", "simpleblog", "simpleblog" );
	
	if(isset($_GET["id"])) {
		$curComments = $dbh->prepare("SELECT * FROM comments WHERE PID=?");
		$curComments->bindParam(1, $_GET["id"]);
		$curComments->execute();
	} else if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["id"]) && isset($_POST["content"])) {
		$stmt = $dbh->prepare("INSERT INTO `simpleblog`.`comments` (`ID`, `PID`, `name`, `email`, `date`, `content`) VALUES (NULL, :id, :name, :email, :date, :content);");
		$stmt->bindParam(":name", $_POST["name"]);
		$stmt->bindParam(":email", $_POST["email"]);
		$stmt->bindParam(":id", $_POST["id"]);
		$stmt->bindParam(":content", $_POST["content"]);
		$date = date('Y-m-d');
		$stmt->bindParam(":date", $date);
		$stmt->execute();
		
		$curComments = $dbh->prepare("SELECT * FROM comments WHERE PID=?");
		$curComments->bindParam(1, $_POST["id"]);
		$curComments->execute();
	}
	
?>

<div class='portocontainer' style="clear:both;">
	
	<?php while ($row = $curComments->fetch(PDO::FETCH_ASSOC)) : ?>
	
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
	</div>
		
	<?php endwhile; ?>
	
</div>
