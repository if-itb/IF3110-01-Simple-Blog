<?php
	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");

	if (!mysqli_connect_errno()) {
		$result = mysqli_query($con, "SELECT * FROM post ORDER BY date DESC, id DESC");

		//preparing HTML part of the output
		$stringPart0 = "<div class='hiddenForm'>
				<ul> <a href = '../VIEW/EditPost.php?id=";
		$stringPart1 = "'> <li> Edit </li> </a> </ul>
				<form id=";
		$stringPart2 = " name='EditDelete' action='javascript:deletePostAjax(";
		$stringPart3 = ")' onsubmit='return validateDeletion()' method='GET'>
					<input id='hidden' name='hidden' type='text' value='";
		$stringPart4 = "'>
					<input type='submit' value='Delete'> </input>
				</form>
			</div>";

		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			echo "<div class='post'>";
			echo "<div class='Title'> <a href = '../VIEW/ViewPost.php?id=".$row["id"]."'> ".$row["title"]."</a> </div>";
			echo "<div class='Date'>".$row["date"]."</div>";
			echo "<div class='Content'>".$row["content"]."</div>";
			echo "<a href = '../VIEW/EditPost.php?id=".$row["id"]."'> Edit </a>";
			echo "<a href = '../PHP/DeletePost.php?Id=".$row["id"]."'> Delete </a>";
			echo "</div>";
		}
		mysqli_close($con);
	
	}
?>