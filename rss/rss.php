<?php
include('../connect.php');
  Header("Content-Type: application/xml; charset=ISO-8859-1");
  echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
        <channel>
        <title>Simple Blog of Bangsatya</title>
        <atom:link href="http://bangsatya.com/rss.xml" rel="self" type="application/rss+xml" />
        <link>http://bangsatya.com</link>
        <description>Simple Blog</description>
        <language>id-ID</language>
        <generator>Bangsatya RSS Generator</generator>
        ';
  $query = mysql_query('select no,judul,konten,tanggal as datex from post order by tanggal desc limit 0,10');

while ($result = mysql_fetch_array($query))
{
  $id = $result['no'];
  $judul = htmlentities(strip_tags($result['judul']), ENT_QUOTES);
  $deskripsi = htmlentities(strip_tags($result['konten']), ENT_QUOTES);
  $date = strftime("%a %d %b %Y %T %Z",$result['datex']);

  echo "<item>";
  echo "<title>$judul</title>";
  echo "<link>http://domainmu.com/news.php?id=$id</link>";
  echo "<guid>http://domainmu.com/news.php?id=$id</guid>";
  echo "<description>$deskripsi</description>";
  echo "<pubDate>$date</pubDate>";
  echo "</item>";
}
echo "</channel></rss>";
?>