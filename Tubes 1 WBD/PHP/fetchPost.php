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
		$result = mysqli_query($con, "SELECT * FROM post ORDER BY datePost DESC, timePost DESC");
		
		//preparing HTML part of the output
		$stringPart0 = "<div class='hiddenForm'>
				<ul> <a href = '../VIEW/editPost.php?id=";
		$stringPart1 = "'> <li> Edit </li> </a> </ul>
				<form id=";
		$stringPart2 = " name='EditDelete' action='javascript:deletePostAjax(";
		$stringPart3 = ")' onsubmit='return validateDeletion()' method='GET'>
					<input id='hidden' name='hidden' type='text' value='";
		$stringPart4 = "'>
					<input type='submit' value='Delete'> </input>
				</form>
			</div>";
		
		//displaying the output
		$postCount = 0;
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			echo "<div class='post' id='PostId".$postCount."'>";
			echo "<div class='postTitle'> <a href = '../VIEW/viewPost.php?id=".$row["id"]."'> ".$row["title"]."</a> </div>";
			$displayDate = dateString($row["datePost"]);
			echo "<div class='postDate'>".$displayDate."</div>";
			echo "<div class='postContent'>".$row["content"]."</div>";
			echo "".$stringPart0.$row["id"].$stringPart1."form".$postCount.$stringPart2.$postCount.", ".$row["id"].$stringPart3.$row["id"].$stringPart4;
			echo "<hr id='separator2'>";
			echo "</div>";
			$postCount++;
		}
		mysqli_close($con);
	}
?>
