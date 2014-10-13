<?php

// FRAMEWORK PRIBADI - Andre Susanto

// Koneksi ke MySQL server
if (!$dbc = @mysqli_connect($dbhost, $dbuser, $dbpassword,$dbname)) die("Can't Connect To Database! Please Contact System Administrator ($systemmail)");


// Fungsi-fungsi database MySQL

function db_fetch ($SQLquery){
	// Fetching QUERY, single result
	
	global $dbc;
	$query = mysqli_query($dbc, $SQLquery);
	return mysqli_fetch_assoc($query);
}

function db_fetchs ($SQLquery){
	// Fetching QUERY, multiple result (ARRAY), array ke 0 adalah jumlah data.
	
	global $dbc;
	$query = mysqli_query($dbc, $SQLquery);
	$jumlah = mysqli_num_rows($query);
	if ($jumlah > 1) {
		$result[0] = $jumlah;
		for($i=1; $i<=$jumlah; $i++){
			$result[$i] =  mysqli_fetch_assoc($query);
		}
		return $result;
	}elseif ($jumlah == 0){
		return 0;
	}else{
		$result[0] = 1;
		$result[1] =  mysqli_fetch_assoc($query);
		return $result;
	}
}

function db_num ($SQLquery){
	// Menghitung jumlah data hasil QUERY
	
	global $dbc;
	$query = mysqli_query($dbc, $SQLquery);
	return mysqli_num_rows($query);
}

function db_execute ($SQLquery){
	// Eksekusi QUERY, bernilai TRUE jika berhasil atau FALSE jika guery tidak memberikan efek ke db
	
	global $dbc;
	mysqli_query($dbc, $SQLquery);

	if(mysqli_affected_rows($dbc)>0){
		return true;
	}else{
		return false;
	}
}
