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

<title> AYE! | Tambah Post</title>

<?php

include 'DBConfig.php';

if(isset($_POST['simpan'])) {
    $Judul=$_POST['Judul'];
    $Tanggal=$_POST['Tanggal'];
    $Konten=$_POST['Konten'];

    $query = mysql_query("INSERT INTO entries (JUDUL, TANGGAL, KONTEN)
                 VALUES ('$Judul','$Tanggal','$Konten')");
    header('Location: index.php');
}
mysql_close($link);

?>

</head>

<body class="default">
    <div class="wrapper">

        <nav class="nav">
            <a style="border:none;" id="logo" href="index.php"><h1> AYE! </h1></a>
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
                        <form id="post" name="post" method="post" action="new_post.php" onsubmit="return validateForm()">
                            <label for="Judul">Judul:</label>
                            <input type="text" name="Judul" id="Judul">

                            <label for="Tanggal">Tanggal:</label>
                            <input type="text" name="Tanggal" id="Tanggal" placeholder="YYYY-MM-DD">
                            
                            <label for="Konten">Konten:</label><br>
                            <textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>

                            <input type="submit" name="simpan" value="simpan" class="submit-button" >
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
                Simple Blog By /
                <a class="rss-link" href="#rss">RSS</a> /
                <br>
                <a class="twitter-link" href="http://twitter.com/akuafik">AFIK</a> /
            </aside>
        </footer>

    </div>
    

    <script type="text/javascript" src="assets/js/fittext.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/respond.min.js"></script>

    <script type="text/javascript">
        function validateForm() {
            var judul = document.getElementById("Judul").value;
            var konten = document.getElementById("Konten").value;
            var date_input = new Date(document.getElementById("Tanggal").value);
            var date_now = new Date();
            console.log("date input : " + date_input);
            console.log("date now : " + date_now);
            console.log("judul:  " + judul);
            console.log("konten: " + konten);
            if (judul == "" || konten == "" || date_input =="") {
                alert("Semua form harus diisi");
                return false;
            }
            else {
                if (date_input.setHours(0,0,0,0) >= date_now.setHours(0,0,0,0)) {
                    return true;
                }
                else {
                    alert("Tanggal salah. Pastikan format benar dan lebih dari hari ini");
                    return false;
                }
            }
        }
    </script>

</body>
</html>