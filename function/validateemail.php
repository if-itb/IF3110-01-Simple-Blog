<?php
	$email = $_GET['email'];
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)){
		echo '<font color=red> Invalid Email </font>' ;
	}
	else{
		echo '<font color=green>'. $email . ' is a Valid Email </font>' ; 
	}
?>