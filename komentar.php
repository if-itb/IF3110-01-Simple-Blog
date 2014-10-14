<?php
	$con = mysql_connect("localhost","root","");
	$dbselect = mysql_select_db("tugaswbd1");
 
    $pid = $_GET['pid'];
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    $komentar = $_GET['komentar'];
                
	    function DisplayWaktu($waktu){
	        $time = (time()+18020) - strtotime($waktu);

	        $seconds = array(
	            31536000 => 'year',
	            2592000 => 'month',
	            604800 => 'week',
	            86400 => 'day',
	            3600 =>'hour',
	            60 => 'minute',
	            1 => 'second'
	        );
	        foreach($seconds as $unit => $text){
	            if($time < $unit) continue;
	            $totalUnits = floor($time / $unit);

	            return $totalUnits.' '.$text.(($totalUnits>1)?'s ':' ')."ago";
	        }
	        return "0's: ago";
	      
	    }

	    $query = mysql_query("INSERT INTO komentar(komentar_idpost, komentar_nama,komentar_email,komentar_konten) values ('$pid', '$nama', '$email', '$komentar')") or die (mysql_error());
	    
	    echo "<ul class=\"art-list-body\" id=\"ListKomentar\">";
	    
	    $query = mysql_query("SELECT * FROM komentar where komentar_idpost = $pid ORDER BY komentar_idKomentar DESC") or die (mysql_error());

	    while($row = mysql_fetch_assoc($query)){
                $nama = $row['komentar_nama'];
                $email = $row['komentar_email'];
                $komentar = $row['komentar_konten'];
                $tanggal = $row['komentar_tanggal'];

                echo "<li class=\"art-list-item\">";
                    echo "<div class=\"art-list-item-title-and-time\">";
                    echo "<h2 class=\"art-list-title\">".$nama."</h2>";
                    echo "<div class=\"art-list-time\">".DisplayWaktu($tanggal)."</div>";
                    echo "</div>";
                    echo "<p>".$komentar."</p>";
                echo "</li>";
	    }

	    echo"</ul>";
?>