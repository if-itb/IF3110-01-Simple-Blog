<?php
	//option
	$paging=true;
	$NUMPERPAGES=5;
	$NUMPAGEBELOW=5;
	$pgcomment=true;
	$NUMPERPAGES_C=5;
	$NUMPAGEBELOW_C=5;
	$db_loc="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="ai_tugas1";
	//end of option
	$db = new mysqli($db_loc,$db_user,$db_pass);
	if (mysqli_connect_errno()){
		trigger_error("Failed to connect to MySQL: ".mysqli_connect_error());
	}
	if (!($db->select_db($db_name))){
		//db not exist
		$db->query("CREATE DATABASE IF NOT EXISTS `".$db_name."` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;");
		$db->query("USE `".$db_name."`;");
		$db->query("
		CREATE TABLE IF NOT EXISTS `comment` (
		  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
		  `Time` datetime NOT NULL,
		  `Parent` bigint(20) NOT NULL,
		  `Name` varchar(255) NOT NULL,
		  `Email` varchar(255) NOT NULL,
		  `Content` text NOT NULL,
		  PRIMARY KEY (`ID`),
		  UNIQUE KEY `ID` (`ID`),
		  KEY `Parent` (`Parent`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
		$db->query("
		CREATE TABLE IF NOT EXISTS `post` (
		  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
		  `Title` varchar(255) NOT NULL,
		  `Date` date NOT NULL,
		  `Content` text,
		  PRIMARY KEY (`ID`),
		  UNIQUE KEY `ID` (`ID`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
		$db->query("
		ALTER TABLE `comment`
		ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Parent`) REFERENCES `post` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;");
	}
	$db->close();
	if (!isset($_GET['p']))$pg_num=1;
	else $pg_num=$_GET['p'];
?>
<a id="Pg_C" name="<?php echo ($pgcomment?1:0);?>"></a>