 <?php
	include ('connectdb.php');
	$query = mysql_query(
		"CREATE TABLE IF NOT EXISTS `post`(
		  `id_post` int(10) NOT NULL AUTO_INCREMENT,
		  `judul` varchar(255) NOT NULL,
		  `tanggal` DATE,
		  `konten` text NOT NULL,
		  PRIMARY KEY (`id_post`)
		)") or die(mysql_error());
	$query = mysql_query ("CREATE TABLE IF NOT EXISTS `comment` (
		  `id_comment` int(10) NOT NULL AUTO_INCREMENT,
		  `nama` varchar(255) NOT NULL,
		  `email` varchar(255) NOT NULL,
		  `komentar` text NOT NULL,
		  `id_post` int(10) NOT NULL,
		  PRIMARY KEY (`id_comment`),
		  KEY `comment_post` (`id_post`),
		  CONSTRAINT `comment_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE
		)") or die(mysql_error());
	if($query){
		header('location:index.php');
	}
	mysql_close();
?>