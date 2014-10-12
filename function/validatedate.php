<?php
	$date = $_GET['date'];
	$datenow = date("Y-m-d");
	if(strtotime($date)<strtotime($datenow)){
		echo "<div style=\"padding-left:120px; padding-bottom:10px;\"><font color=red> Invalid Date </font></div>";
	}

?>