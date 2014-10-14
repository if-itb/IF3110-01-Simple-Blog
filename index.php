<?php
include "mysql.php";
$table = "ENTRIES";
$sql = "SELECT * from `$table`";
$result = mysql_query($sql);

echo "<html>";
echo "<head>";

echo "<meta charset='utf-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>";
echo "<meta name='description' content='Deskripsi Blog'>";
echo "<meta name='author' content='Judul Blog'>";

echo "<meta name='twitter:card' content='summary'>";
echo "<meta name='twitter:site' content='omfgitsasalmon'>";
echo "<meta name='twitter:title' content='Simple Blog'>";
echo "<meta name='twitter:description' content='Deskripsi Blog'>";
echo "<meta name='twitter:creator' content='Simple Blog'>";
echo "<meta name='twitter:image:src' content='{{! TODO: ADD GRAVATAR URL HERE }}'>";

echo "<meta property='og:type' content='article'>";
echo "<meta property='og:title' content='Simple Blog'>";
echo "<meta property='og:description' content='Deskripsi Blog'>";
echo "<meta property='og:image' content='{{! TODO: ADD GRAVATAR URL HERE }}'>";
echo "<meta property='og:site_name' content='Simple Blog'>";

echo "<link rel='stylesheet' type='text/css' href='assets/css/screen.css' />";
echo "<link rel='shortcut icon' type='image/x-icon' href='img/favicon.ico'>";


echo "<title>Simple Blog</title>";


echo "</head>";

echo "<body class='default'>";
echo "<div class='wrapper'>";

echo "<nav class='nav'>";
    echo "<a style='border:none;' id='logo' href='index.php'><h1>Simple<span>-</span>Blog</h1></a>";
    echo "<ul class='nav-primary'>";
        echo "<li><a href='new_post.php?id=0'>+ Tambah Post</a></li>";
    echo "</ul>";
echo "</nav>";


echo "<div id='home'>";
    echo "<div class='posts'>";
        echo "<nav class='art-list'>";
          echo "<ul class='art-list-body'>";
		  while($row = mysql_fetch_array($result))
            {
            echo "<li class='art-list-item'>";
					echo "<div class='art-list-item-title-and-time'>";
                    echo "<h2 class='art-list-title'><a href=\"post.php?id=$row[ID]\">" .$row['TITLE']."</a></h2>";
                    echo "<div class='art-list-time'>".$row['TANGGAL']."</div>";
                echo "</div>";
                echo "<p>".$row['CONTENT']."</p>";
                echo "<p> <a href='new_post.php?id=$row[ID]'>Edit</a> | <a href=\"dbdelete.php?id=$row[ID]\"onClick=\"return window.confirm('Apakah anda yakin ingin menghapus post ini?')\">Hapus</a> </p> </li>";
			}

          echo "</ul>";
        echo "</nav>";
    echo "</div>";
echo "</div>";

echo "<footer class='footer'>";
    echo "<div class='back-to-top'><a href=''>Back to top</a></div>";
    echo "<!-- <div class='footer-nav'><p></p></div> -->";
    echo "<div class='psi'>&Psi;</div>";
    echo "<aside class='offsite-links'>";
        echo "<a class='twitter-link' href='http://twitter.com/ivanaclairine'>Ivana Clairine</a> / 13512041";
        
    echo "</aside>";
echo "</footer>";

echo "</div>";

echo "</body>";
echo "</html>";

?>