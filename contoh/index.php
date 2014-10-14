<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Home | Website Jurnal Sosioteknologi</title>
	<?php include "meta_and_css.php" ?>	
</head>

<body>
	<?php include "topbar.php" ?>
		<div class="container-fluid">
		<div class="row-fluid">
			<?php include "left_menu.php" ?>
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->

			<?php
				if(isset($_SESSION['logged_in'])){
				if($_SESSION['logged_in']!=null){
					$user = $_SESSION['logged_in'];

					echo '<h6>MY JOURNALS</h6>';
					
					echo '<div class="row-fluid sortable">';
						echo '<div class="box span10">';
							echo '<div class="box-header well" data-original-title>';
								echo '<h2><i class="icon-tasks"></i> My Journals Status</h2>';
							echo'</div>';
							echo '<div class="box-content">';
								include "database_connection.php";
								$query_user = "select nama_lengkap from penulis where username='".$user."'";
								$hasil = mysql_query($query_user,$db);
								$row = mysql_fetch_array($hasil);

								$query_jurnal = "select id from jurnal_terpublish where penulis='".$row['nama_lengkap']."'";
								$hasil = mysql_query($query_jurnal,$db);
								$n = mysql_num_rows($hasil);
								echo '<p>Published: '.$n.' | ';

								$query_jurnal = "select id from jurnal where diupload_oleh='$user' and status<>0";
								$hasil = mysql_query($query_jurnal,$db);
								$n = mysql_num_rows($hasil);
								echo 'On going: '.$n.' | ';

								$query_jurnal = "select id from jurnal where diupload_oleh='$user' and status=0";
								$hasil = mysql_query($query_jurnal,$db);
								$n = mysql_num_rows($hasil);
								echo 'Rejected: '.$n.'</p>

								<p> See all <a href="my_journals.php">here</a></p>';
							echo '</div>
						</div>
					</div>';

					echo '<div class="row-fluid sortable">';
						echo '<div class="box span10">';
							echo '<div class="box-header well" data-original-title>';
								echo '<h2><i class="icon-tasks"></i> On-going Journals</h2>';
							echo'</div>';
							echo '<div class="box-content">';
								$query_post = "select * from jurnal where diupload_oleh='$user' and status<>0";
								$hasil = mysql_query($query_post,$db);
								if(mysql_num_rows($hasil)==0) {
									echo '<p>Tidak ada jurnal yang sedang diproses</p>';
								} else {
									echo '<ul>';
									while($row = mysql_fetch_array($hasil)){
										if($row['status']==1){
											$pesan = 'Sudah sampai redaktur, belum diputuskan keberterimaannya';
										}
										else if($row['status']==2){
											$pesan = 'Diterima oleh redaktur, belum di-review oleh reviewer';
										}
										else if($row['status']==3){
											$id=$row['id'];
											$query_track = "select path_trackchanges from penilaian where id_makalah='$id'";
											$result = mysql_query($query_track,$db);
											$baris = mysql_fetch_array($result);
											$path = $baris['path_trackchanges'];
											$pesan = 'Diterima oleh reviewer dengan syarat Anda harus melakukan revisi berdasarkan track-changes <a href="mitra-bestari/'.$path.'">di sini</a>. Upload revisi <a href="submit_form.php">ke sini</a>.';
										}
										else if($row['status']==4){
											$id=$row['id'];
											$query_track = "select path_trackchanges from penilaian where id_makalah='$id'";
											$result = mysql_query($query_track,$db);
											$baris = mysql_fetch_array($result);
											$path = $baris['path_trackchanges'];
											$pesan = 'Diterima oleh reviewer dan diteruskan ke editor. Lihat track-changes <a href="mitra-bestari/'.$path.'">di sini</a>';
										}
										echo '<li><h2>'.$row['judul'].'</h2><p>'.$pesan.'</p>
										<div class="progress progress-striped progress-success active">
											<div class="bar" style="width: '.($row['status']*20).'%;">
											</div>
										</div></li>';
									}
									echo '</ul>';
								}
							echo '</div>
						</div>
					</div>';
				}
				}
			?>
			<hr>
			<h6>NOTIFICATION FROM JURNAL SOSIOTEKNOLOGI</h6>
			<?php 
				include "database_connection.php";
				$query_post = "select * from post where lokasi='announcements'";
				$hasil = mysql_query($query_post,$db);
				while($row = mysql_fetch_array($hasil)){
					echo '<div class="row-fluid sortable">
							<div class="box span10">
								<div class="box-header well" data-original-title>
									<h2><i class="icon-bullhorn"></i> '.$row['judul'].'</h2>
								</div>
								<div class="box-content">'.$row['content'].'</div>
							</div>
						</div>';
				}
			?>
					<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		<?php include "modal_settings.php" ?>
		<?php include "footer.php" ?>
		
	</div><!--/.fluid-container-->

	<?php include "script_dependencies.php" ?>
	
</body>
</html>
