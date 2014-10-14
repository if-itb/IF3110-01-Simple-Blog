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
<script src="assets/js/utility.js"></script>
<script>
function validateForm(){
	var tanggalInput = document.forms["edit-post"]["Tanggal"].value
	if (checkdate(tanggalInput) == false) {return false;}
	var currentDate = new Date();
	tanggalInput = stringToDate(tanggalInput);
	var truth = !isDateLater(currentDate,tanggalInput);
	if (truth == false) alert("Tanggal yang dimasukan harus lebih besar atau sama dengan sekarang")
	return truth
}
</script>
<title>Simple Blog | Tambah Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.html"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form name="edit-post" method="post" onsubmit="return validateForm()" action="edit-post-sql.php">
                    <?php
						$con=mysqli_connect("localhost","root","","blog_content");

						// Check connection
						if (mysqli_connect_errno()) {
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						// escape variables for security
						$id = mysqli_real_escape_string($con, $_GET['id']);
						$result = mysqli_query($con,"SELECT * FROM `blog` WHERE `ID` = $id");
						if (!$result) {
							printf("Error: %s\n", mysqli_error($con));
							exit();
						}
						$row = mysqli_fetch_array($result);
						
						echo "<input type=\"hidden\" name=\"id\" value=\"{$id}\">";
						echo "<label for=\"Judul\">Judul:</label>";
						echo "<input type=\"text\" name=\"Judul\" id=\"Judul\" value=\"{$row['JUDUL']}\">";

						//parsing tanggal dari mysql ke html
						list($tahun, $bulan, $hari) = explode("-", $row['TANGGAL']);
						$tanggal = $hari."/".$bulan."/".$tahun;
						
						echo "<label for=\"Tanggal\">Tanggal:</label>";
						echo "<input type=\"text\" name=\"Tanggal\" id=\"Tanggal\" value=\"{$tanggal}\">";
						
						echo "<label for=\"Konten\">Konten:</label><br>";
						echo "<textarea name=\"Konten\" rows=\"20\" cols=\"20\" id=\"Konten\">{$row['ISI']}</textarea>";
						
						mysqli_close($con);
						
					?>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>


</body>
</html>