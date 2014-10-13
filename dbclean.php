<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cleaning database</title>
    </head>
    <body>
		Cleaning Database...
		<?php 
			$dbh = new PDO( "mysql:dbname=simpleblog;host=localhost", "simpleblog", "simpleblog" );
			$deletor = $dbh->prepare("SELECT * FROM comments WHERE PID=?");
			$curComments->execute();
		
		?>
		Database cleaned and renewed.
    </body>
</html>
