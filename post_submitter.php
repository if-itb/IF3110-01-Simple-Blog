<?php
	$username = "root";
	$password = "";
	$db = "simpleblog";
	$con = mysqli_connect('localhost', $username, $password,$db) or die("Unable to connect to MySQL");	
	$query = "INSERT INTO post (Title, Content, Date) VALUES ('" . $_POST["Judul"] . "', '" . $_POST["Konten"] . "', '" . to_date_type($_POST["Tanggal"]). "')";
	$result = mysqli_query($con,$query) or die("Unable to execute query");
	mysqli_close($con); 
	header('Location: index.php');
	
	function to_date_type($date) 
	{
		$mon_to_num = array(
			"Januari"   => "01",
			"Februari"  => "02",
			"Maret"     => "03",
			"April"     => "04",
			"Mei"       => "05",
			"Juni"      => "06",
			"Juli"      => "07",
			"Agustus"   => "08",
			"September" => "09",
			"Oktober"   => "10",
			"November"  => "11",
			"Desember"  => "12",
			"01" => "01",
			"02" => "02",
			"03" => "03",
			"04" => "04",
			"05" => "05",
			"06" => "06",
			"06" => "06",
			"07" => "07",
			"08" => "08",
			"09" => "09",
			"10" => "10",
			"11" => "11",
			"12" => "12"
		);					
		$splitted = explode(" ",$date);
		$result = $splitted[2]."-".$mon_to_num[$splitted[1]]."-".$splitted[0];
		$result = $result." 00:00:00";//optional
		return $result;
	}
?>
