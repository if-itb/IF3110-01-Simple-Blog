<?php 

	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");

	//check connection
	if (!mysqli_connect_errno()) {
		//success connecting to database
		$id = $_GET["id"];
		$result = mysqli_query($con, "SELECT * FROM comment WHERE postID=".$id." ORDER BY date DESC, time DESC");
		
		//preparing HTML part of the output
		$stringPart1 = "<span class='hiddenForm'> <form id=";
		$stringPart2 = " name='deleteCommentForm' action='javascript:deleteComment(";
		$stringPart3 = ")' onsubmit='return validateDeletion()' method='GET'>
					<input id='hidden' name='hidden' type='text' value='";
		$stringPart4 = "'>
					<input type='submit' value='Delete'> </input>
				</form>
			</span>";
			
		while ($row = mysqli_fetch_array($res ult, MYSQL_ASSOC)) {
			echo "<div class='CommentContainer' id='CommentNumber".$postCount."'>";
			echo "<span class='NameComment'> <b>".$row["name"]."</b>,  on </span>";
			$dateFormat = dateString($row["date"]);
			echo "<span class='dateComment'> ".dateString($row["date"])." says </span>";
			echo "<div class='CommentComment'> ".$row["comment"]."</div>";
			echo $stringPart1."form".$postCount.$stringPart2.$postCount.", ".$row["CommentID"].$stringPart3.$row["CommentID"].$stringPart4;
			echo "<hr id='separator'>";
			echo "</div>";
			echo "<br>";
		}
		mysqli_close($con);
	}

?>