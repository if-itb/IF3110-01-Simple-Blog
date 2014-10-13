<?php 
	include '../template/dbconnect.php';

	function getData($id){
    $query = "SELECT nama,tanggal,komen FROM komentar WHERE id='$id'";
    $result = mysql_query($query);
    if(!$result){
        echo 'Failed Query';
    }
    $output = array();
    while($row = mysql_fetch_row($result)){
      array_push($output, $row[0]);
      array_push($output, $row[1]);
      array_push($output, $row[2]);
    }
    return $output;
  	}

	$id_post = $_GET['id_post'];
	
	$query = "SELECT komentar FROM posting WHERE id='$id_post'";
	$result = mysql_query($query);
	if(!$result){
		echo "Query can't be processed";
	}
	while($row=mysql_fetch_row($result)){
		$curr_id_komentar = $row[0];
	}

	$split = explode(",", $curr_id_komentar);
	if(sizeof($split) == 1){
		echo 'Belum Terdapat Komentar';
	}

    for($i=sizeof($split)-2;$i>=0;$i--){ $currdata = getData($split[$i]);
        echo '<li class="art-list-item">';
        echo '<div class="art-list-item-title-and-time">';
        echo '<h2 class="art-list-title">'.$currdata[0].'</h2>';
        echo '<div class="art-list-time">'.$currdata[1].'</div>';
        echo '</div>';
        echo '<p>'.$currdata[2].'</p>';
        echo '</li>';
    }

?>