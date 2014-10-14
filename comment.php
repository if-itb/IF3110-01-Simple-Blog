<?php include 'init.php';?>
<?php
	$db = new mysqli($db_loc,$db_user,$db_pass,$db_name);
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
	$result = $db->query("SELECT Count(*) AS a FROM comment WHERE Parent=".$_POST['pid'].";");
	$res = $result->fetch_array(MYSQLI_ASSOC);
	$pg_max=0;
	$pg_max=$res['a'];
	if ($pg_max>0){
		if ($pgcomment){
			if (!isset($_POST['p']))$pg_num=1;
			else $pg_num=$_POST['p'];
			$result = $db->query("SELECT * FROM comment WHERE Parent=".$_POST['pid']." ORDER BY Time DESC LIMIT ".$NUMPERPAGES_C." OFFSET ".($pg_num-1)*$NUMPERPAGES_C.";");
		} else {
			$result = $db->query("SELECT * FROM comment WHERE Parent=".$_POST['pid']." ORDER BY Time DESC;");
		}
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
				elseif($day_diff<7)$time=$day_diff.' HARI LALU';
				elseif($day_diff<31)$time=ceil($day_diff/7).' MINGGU LALU';
				elseif($day_diff<60)$time='BULAN LALU';
				else $time=$bulan[date('n',$tgl)-1]." ".date('Y',$tgl);
				
				echo "
				<li class=\"art-list-item\">
					<div class=\"art-list-item-title-and-time\">
						<h2 class=\"art-list-title\"><a href=\"mailto:".$res['Email']."\">".$res['Name']."</a></h2>
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
					<div class=\"art-list-time\">Invalid Page</div>
				</div>
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
<ul class="pagination">
<?php
	if ($pg_max>0&&$pgcomment){
		$pg_max=ceil($pg_max/$NUMPERPAGES_C);
		$f1=false;
		$f2=false;
		$a=0;$b=0;
		$a=$pg_num-(($NUMPAGEBELOW_C-($NUMPAGEBELOW_C%2==0?2:1))/2);
		$b=$pg_num+(($NUMPAGEBELOW_C-($NUMPAGEBELOW_C%2==0?0:1))/2);
		if ($a<1){
			$a=1;$f1=true;
		}
		if ($b>$pg_max){
			$b=$pg_max;$f2=true;
		}
		if ($f1!=$f2){
			if ($f1){
				$b=$a+$NUMPAGEBELOW_C-1;
				if ($b>$pg_max)$b=$pg_max;
			} else {
				$a=$b-$NUMPAGEBELOW_C+1;
				if ($a<1)$a=1;
			}
		}
		echo "
		<li>
			<a href=\"#comment\" onclick=\"LoadComment(".($pg_num>1?$pg_num-1:$pg_num).")\">Prev</a>
		</li>";
		for ($i=$a;$i<=$b;$i++){
			echo "
			<li".($i==$pg_num?" class=\"active\"":"").">
				<a href=\"#comment\" onclick=\"LoadComment(".($i).")\">".($i)."</a>
			</li>";
		}
		echo "
		<li>
			<a href=\"#comment\" onclick=\"LoadComment(".($pg_num+1<=$pg_max?$pg_num+1:$pg_max).")\">Next</a>
		</li>";
	}
?>
</ul>