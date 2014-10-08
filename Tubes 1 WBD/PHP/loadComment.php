<?php
	/* Fetching post code to be shown in home.php */
	
	function dateString($date) {
		$mm = $date[5].$date[6];
		$str;
		switch ($mm) {
			case "01" : {
				$str = " January ";
				break;
			}
			case "02" : {
				$str = " February ";
				break;
			}
			case "03" : {
				$str = " March ";
				break;
			}
			case "04" : {
				$str = " April ";
				break;
			}
			case "05" : {
				$str = " May ";
				break;
			}
			case "06" : {
				$str = " June ";
				break;
			}
			case "07" : {
				$str = " July ";
				break;
			}
			case "08" : {
				$str = " August ";
				break;
			}
			case "09" : {
				$str = " September ";
				break;
			}
			case "10" : {
				$str = " October ";
				break;
			}
			case "11" : {
				$str = " November ";
				break;
			}
			case "12" : {
				$str = " December ";
				break;
			}
			default : {
				$str = "Error";
			}
			
		}
		$result = ($date[8].$date[9].$str.$date[0].$date[1].$date[2].$date[3]);
		return $result;
	}

	require_once('startConnection.php');
	
	//check connection
	if (mysqli_connect_errno()) {
		//Failed to connect to database
		$url = "../VIEW/dbFail.html";
		header( "Location: $url" ); 
	}
	else {
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
			
		//displaying the output
		$postCount = 0;
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			echo "<div class='commentContainer' id='commentNumber".$postCount."'>";
			echo "<span class='nameComment'> <b>".$row["name"]."</b>,  on </span>";
			$dateFormat = dateString($row["date"]);
			echo "<span class='dateComment'> ".dateString($row["date"])." says </span>";
			echo "<div class='commentComment'> ".$row["comment"]."</div>";
			echo $stringPart1."form".$postCount.$stringPart2.$postCount.", ".$row["commentID"].$stringPart3.$row["commentID"].$stringPart4;
			echo "<hr id='separator'>";
			echo "</div>";
			echo "<br>";
			$postCount++;
		}
		mysqli_close($con);
	}
?>
