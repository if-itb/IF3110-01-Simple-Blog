<?php
	date_default_timezone_set('Asia/Jakarta');
	$con=mysqli_connect("localhost","root","","dbblog");
	if(mysqli_connect_errno()){
		echo "Gagal menghubungkan ke basis data blog";
	}
	
	$id = $_GET['ID'];
	$name = $_GET['Nama'];
	$time = date("Y-m-d H:i:s");
	$comment = $_GET['Komentar'];
		
	mysqli_query($con, "INSERT INTO komen (ID, Nama, Waktu, Komentar)
				VALUES ('$id', '$name', '$time', '$comment')");	
	
	$res = mysqli_query($con, "SELECT * FROM komen WHERE ID=$id ORDER BY Waktu DESC");
	while($tabel = mysqli_fetch_array($res)){
			$selisih = time() - strtotime($tabel['Waktu']);
		if($selisih > 3600){
			$Jam = floor($selisih/3600);
			if($Jam >= 24){
				$Hari = $Jam - 24;
				$Jam = $Jam - 24;
				$selisih %= 3600;
				$Menit = floor($selisih/60);
				echo "
					<li class='art-list-item'>
						<div class='art-list-item-title-and-time'>
							<h2 class='art-list-title'><a href=''>".$tabel['Nama']."</a></h2>
							<div class='art-list-time'>{$Hari} hari {$Jam} jam {$Menit} menit</div>
						</div>
						<p>".$tabel['Komentar']."&hellip;</p>
					</li>
				";
			}
			else{
				$selisih %= 3600;
				$Menit = floor($selisih/60);
				echo "
					<li class='art-list-item'>
						<div class='art-list-item-title-and-time'>
							<h2 class='art-list-title'><a href=''>".$tabel['Nama']."</a></h2>
							<div class='art-list-time'>{$Jam} jam {$Menit} menit</div>
						</div>
						<p>".$tabel['Komentar']."&hellip;</p>
					</li>
				";
			}
		}
		else{
			$Menit = floor ($selisih/60);
			echo "
					<li class='art-list-item'>
						<div class='art-list-item-title-and-time'>
							<h2 class='art-list-title'><a href=''>".$tabel['Nama']."</a></h2>
							<div class='art-list-time'>{$Menit} menit</div>
						</div>
						<p>".$tabel['Komentar']."&hellip;</p>
					</li>
			";
		}
	}
	
	mysqli_close($con);
?>
