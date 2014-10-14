<?php 

	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");

	//check connection
	if (!mysqli_connect_errno()) {
		//success connecting to database
		$id = $_GET["id"];
		$result = mysqli_query($con, "SELECT * FROM comment WHERE idPost=".$id." ORDER BY date DESC, id DESC");

		//preparing HTML part of the output
		$stringPart1 = "<span class='hiddenForm'> <form id=";
		$stringPart2 = " name='deleteCommentForm' action='javascript:deleteComment(";
		$stringPart3 = ")' onsubmit='return validateDeletion()' method='GET'>
					<input id='hidden' name='hidden' type='hidden' value='";
		$stringPart4 = "'>
					<input type='submit' value='Delete'> </input>
				</form>
			</span>";
		$postCount=0;
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			echo "<div class='CommentContainer' id='CommentNumber".$postCount."'>";
			echo "<span class='NameComment'> <b>".$row["name"]."</b>,  on </span>";
			$dateFormat = $row["date"];
			echo "<span class='date'> ".$row["date"]." </span>";
			echo "<div class='CommentComment'> ".$row["content"]."</div>";
			echo $stringPart1."form".$postCount.$stringPart2.$postCount.", ".$row["id"].$stringPart3.$row["id"].$stringPart4;
			echo "<hr id='separator'>";
			echo "</div>";
			echo "<br>";
			$postCount++;

		}
		mysqli_close($con);
	}

?>