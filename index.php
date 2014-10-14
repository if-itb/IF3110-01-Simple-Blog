<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.html"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title" id="judul1"><a href="post.html">Apa itu Simple Blog?</a></h2>
                    <div class="art-list-time" id="tanggal1">15 Juli 2014</div>
                    <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                </div>
                <p id ="konten1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;
								
				
				
				
				<?php 
						
					?>
				<script>
					<?php
					$filename = "newfile.txt";
					$lines = file($filename, FILE_IGNORE_NEW_LINES);
					if(isset($_POST["Judul"])){
						array_unshift($lines,"");
						array_unshift($lines,"");
						array_unshift($lines,"");
						array_unshift($lines,"");
						array_unshift($lines,$_POST["Konten"]);
						array_unshift($lines,$_POST["Tanggal"]);
						array_unshift($lines,$_POST["Judul"]);
					}
					if(isset($_POST["JudulEdit"])){
					$idxchange = array_search($_POST["JudulEdit"],$lines);
					$lines[$idxchange] = $_POST["JudulEdit"];
					$lines[$idxchange+1] = $_POST["TanggalEdit"];
					$lines[$idxchange+2] = $_POST["KontenEdit"];
					}
					
					
					if(isset($_POST["deleteP"])){
						$idxchange = array_search($_POST["deleteP"],$lines);
						array_splice($lines,$idxchange,7);
					}	
					
					if(isset($_POST["komentarK"])){
						$idxchange = $_POST["idxK"];
						$lines[$idxchange] = $_POST["namaK"];
						$lines[$idxchange+1] = $_POST["emailK"];
						$lines[$idxchange+3] = $_POST["komentarK"];
					}
					
					$js_array = json_encode($lines);
					echo "var array_data = ". $js_array . ";\n";
					?>
					
					function getJudul(a){
						return array_data[a*7];
					}
					
					function getTgl(a){
						return array_data[1+a*7];
					}
					
					function getKonten(a){
						return array_data[2+a*7];
					}
					
					function getKomentarNama(a){
						return array_data[3+a*7];
					}
					
					function getKomentarEmail(a){
						return array_data[4+a*7];
					}
					
					function getKomentarTanggal(a){
						return array_data[5+a*7];
					}
					
					function getKomentarIsi(a){
						return array_data[6+a*7];
					}
					
					function returnArray(a){
						return a;
					}
					
					
				</script>
				
			
				
				<?php
				$myfile = fopen("newfile.txt","w") or die("could not open file");
				for ($c=0; $c<count($lines)-1; $c++){
					fwrite($myfile,$lines[$c]."\r\n");
				}
				fwrite($myfile,$lines[$c]);
				fclose($myfile);
				?>
				
				</p>
                <p>
					<form method="post" action="edit_post.php">
					<input type="hidden" name="judul1" value="<?php echo $lines[0];?>" id="judul1">
					<input type="hidden" name="tanggal1" value="<?php echo $lines[1];?>" id="tanggal1">
					<input type="hidden" name="konten1" value="<?php echo $lines[2];?>" id="konten1">
					<input type="submit" value = "Edit"> 
					</form>
					
				<form method="post" action="index.php">
					<input type="hidden" name="deleteP" id="deleteP" value="<?php echo $lines[0];?>">
					<input type="submit" value = "Hapus"></a>
					</form>
				
				
				<form method="post" action="komentar.php">
					<input type="hidden" name="idx" id="idx" value="<?php echo 3;?>">
					<input type="submit" value = "Komentar"></a>
					</form>
					
					<form method="post" action="view.php">
					<input type="hidden" name="judul1" value="<?php echo $lines[0];?>" id="judul1">
					<input type="hidden" name="tanggal1" value="<?php echo $lines[1];?>" id="tanggal1">
					<input type="hidden" name="konten1" value="<?php echo $lines[2];?>" id="konten1">
					<input type="submit" value = "View"> 
					</form>
				</p>
            </li>

            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title" id="judul2"><a href="post.html">Siapa dibalik Simple Blog?</a></h2>
                    <div class="art-list-time" id="tanggal2">11 Juli 2014</div>
                </div>
                <p id="konten2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                <p>
					<form method="post" action="edit_post.php">
					<input type="hidden" name="judul1" value="<?php echo $lines[7];?>" id="judul1">
					<input type="hidden" name="tanggal1" value="<?php echo $lines[8];?>" id="tanggal1">
					<input type="hidden" name="konten1" value="<?php echo $lines[9];?>" id="konten1">
					<input type="submit" value = "Edit"> 
					</form>
					
				<form method="post" action="index.php">
					<input type="hidden" name="deleteP" id="deleteP" value="<?php echo $lines[7];?>">
					<input type="submit" value = "Hapus"></a>
					</form>
					
					<form method="post" action="komentar.php">
					<input type="hidden" name="idx" id="idx" value="<?php echo 10;?>">
					<input type="submit" value = "Komentar"></a>
					</form>
					<form method="post" action="view.php">
					<input type="hidden" name="judul1" value="<?php echo $lines[0];?>" id="judul1">
					<input type="hidden" name="tanggal1" value="<?php echo $lines[1];?>" id="tanggal1">
					<input type="hidden" name="konten1" value="<?php echo $lines[2];?>" id="konten1">
					<input type="submit" value = "View"> 
					</form>
			
				</p>
            </li>
          </ul>
        </nav>
    </div>
</div>

<script>
document.getElementById("judul1").innerHTML = getJudul(0);
document.getElementById("tanggal1").innerHTML = getTgl(0);
document.getElementById("konten1").innerHTML = getKonten(0);
document.getElementById("judul2").innerHTML = getJudul(1);
document.getElementById("tanggal2").innerHTML = getTgl(1);
document.getElementById("konten2").innerHTML = getKonten(1);
</script>

</body>
</html>