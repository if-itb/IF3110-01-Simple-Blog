<?php
	$db = new mysqli("localhost","root","","ai_tugas1");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if($_POST['x']==1){
		//add comment
		$sql="INSERT INTO `ai_tugas1`.`comment` (`ID`,`Time`,`Parent`,`Name`,`Email`,`Content`) VALUES (NULL,CURRENT_TIME(),?,?,?,?);";
		$stmt=$db->prepare($sql);
		if($stmt===false) {
			trigger_error('Wrong SQL: '.$sql.' Error: '.$db->errno.' '.$db->error, E_USER_ERROR);
		}
		$stmt->bind_param('isss',$_POST['pid'],htmlentities($_POST['Nama']),$_POST['Email'],htmlentities($_POST['Komentar']));
		if (!$stmt->execute()){
			trigger_error('Error adding comment: '.$db->error);
		}
	} else if($_POST['x']==2){
		//delete comment
		$sql="DELETE FROM `ai_tugas1`.`comment` WHERE `comment`.`ID`=?;";
		$stmt=$db->prepare($sql);
		if($stmt===false) {
			trigger_error('Wrong SQL: '.$sql.' Error: '.$db->errno.' '.$db->error, E_USER_ERROR);
		}
		$stmt->bind_param('i',$_POST['id']);
		if (!$stmt->execute()){
			trigger_error('Error deleting comment: '.$db->error);
		}
	}
	/*if (!isset($_GET['id']))$tp=1;
	else $tp=$_GET['p'];*/
	$result = $db->query("SELECT * FROM comment WHERE Parent=".$_POST['pid']." ORDER BY Time DESC;");
	$tp2=mysqli_num_rows($result);
	if ($tp2>0){
		while($res = $result->fetch_array(MYSQLI_ASSOC)){
			$tgl=strtotime($res['Time']);
			$diff=time()-$tgl;
			$day_diff=floor($diff/86400);
			if($day_diff==0){
				if($diff<60)$time='<1 MENIT LALU';
				elseif($diff<3600)$time=floor($diff/60).' MENIT LALU';
				elseif($diff<86400)$time=floor($diff/3600).' JAM LALU';
			}
			//elseif($day_diff==1)$time='KEMARIN';
			elseif($day_diff<7)$time=$day_diff.' HARI LALU';
			elseif($day_diff<31)$time=ceil($day_diff/7).' MINGGU LALU';
			elseif($day_diff<60)$time='BULAN LALU';
			else $time=$bulan[date('n',$tgl)-1]." ".date('Y',$tgl);
			
			echo "
			<li class=\"art-list-item\">
				<div class=\"art-list-item-title-and-time\">
					<h2 class=\"art-list-title\"><a href=\"post.php\">".$res['Name']."</a></h2>
					<div class=\"art-list-time\">".$time."<br>
					<a onclick=\"DeleteComment(".$res['ID'].");\">Hapus</a>
					</div>
				</div>
				<p>".str_replace("\n","<br>",$res['Content'])."</p>
			</li>";
		}
	} else {
		echo "
		<li class=\"art-list-item\">
			<div class=\"art-list-item-title-and-time\">
				<h2 class=\"art-list-title\"></h2>
				<div class=\"art-list-time\">There is no comment</div>
			</div>
		</li>";
	}
	$db->close();
?>