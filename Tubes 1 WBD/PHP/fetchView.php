<?php
	/* Fetching post code to be shown in viewPost.html */
	
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
		$result = mysqli_query($con, "SELECT * FROM post where id=".$id);
		
		//displaying the output
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			echo "<div class='postTitle'> <h2>".$row["title"]."</h2> </div>";
			$displayDate = dateString($row["datePost"]);
			echo "<div class='postDate'>".$displayDate."</div>";
			echo "<br>";
			echo "<div class='viewContent'>".$row["content"]."</div>";
		}
		mysqli_close($con);
	}
?>
