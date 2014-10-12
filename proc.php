<?php
	function validTgl($in){
		if (!strtotime($in))return false;
		return (strtotime($in)-strtotime(date("Y-m-d",time()))>=0);
	}
	if($_GET['x']==1){
		//add post
		if (strtotime($_POST['Tanggal'])){
			$db = new mysqli("localhost","root","","ai_tugas1");
			if (mysqli_connect_errno()){
				trigger_error("Failed to connect to MySQL: ".mysqli_connect_error());
			}
			$sql="INSERT INTO `ai_tugas1`.`post` (`ID`,`Title`,`Date`,`Content`) VALUES (NULL,?,?,?);";
			$stmt=$db->prepare($sql);
			if($stmt===false) {
				trigger_error('Wrong SQL: '.$sql.' Error: '.$db->errno.' '.$db->error, E_USER_ERROR);
			}
			$stmt->bind_param('sss',htmlentities($_POST['Judul']),date('Y-m-d',strtotime($_POST['Tanggal'])),htmlentities($_POST['Konten']));
			if (!$stmt->execute()){
				trigger_error('Error adding post: '.$db->error);
			}
			$db->close();
			header('Location: index.php');
		} else {
			
		}
	} else if($_GET['x']==2){
		//edit post
		$db = new mysqli("localhost","root","","ai_tugas1");
		if (mysqli_connect_errno()){
			trigger_error("Failed to connect to MySQL: ".mysqli_connect_error());
		}
		$sql="UPDATE `ai_tugas1`.`post` SET `Title`=?,`Date`=?,`Content`=? WHERE `post`.`ID`=?;";
		$stmt=$db->prepare($sql);
		if($stmt===false) {
			trigger_error('Wrong SQL: '.$sql.' Error: '.$db->errno.' '.$db->error, E_USER_ERROR);
		}
		$stmt->bind_param('sssi',htmlentities($_POST['Judul']),date('Y-m-d',strtotime($_POST['Tanggal'])),htmlentities($_POST['Konten']),$_POST['ID']);
		if (!$stmt->execute()){
			trigger_error('Error editing post: '.$db->error);
		}
		$db->close();
		header('Location: post.php?id='.$_POST['ID']);
	} else if($_GET['x']==3){
		//delete post
		$db = new mysqli("localhost","root","","ai_tugas1");
		if (mysqli_connect_errno()){
			trigger_error("Failed to connect to MySQL: ".mysqli_connect_error());
		}
		$sql="DELETE FROM `ai_tugas1`.`post` WHERE `post`.`ID`=?;";
		$stmt=$db->prepare($sql);
		if($stmt===false) {
			trigger_error('Wrong SQL: '.$sql.' Error: '.$db->errno.' '.$db->error, E_USER_ERROR);
		}
		$stmt->bind_param('i',$_GET['id']);
		if (!$stmt->execute()){
			trigger_error('Error deleting post: '.$db->error);
		}
		echo $db->error;
		$db->close();
		header('Location: index.php');
	} else if ($_GET['x']==4){
		//validasi tanggal
		if (strtotime($_POST['Tanggal'])){
			if (validTgl($_POST['Tanggal'])){
				echo "";
				//echo date("Y-m-d",strtotime($_POST['Tanggal']));
			} else {
				echo "<label></label><input type=\"text\" disabled value=\"Can't input past date\">";
			}
		} else {
			echo "<label></label><input type=\"text\" disabled value=\"Wrong date format\">";
		}
	}
?>