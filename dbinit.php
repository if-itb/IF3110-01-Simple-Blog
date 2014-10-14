<! Database Initiator>
<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	$dbselect = mysql_select_db( 'simple_blog_db' );
	if(! $dbselect)
	{
		$sql = 'CREATE Database simple_blog_db'; /* Make new database */
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
				die('Could not create database: ' . mysql_error());
		}
		
		/* Make new table for posts */
		$sql = 'CREATE TABLE posts( '.
			'post_id INT NOT NULL AUTO_INCREMENT, '.
			'post_title VARCHAR(20) NOT NULL, '.
			'post_date  VARCHAR(20) NOT NULL, '.
			'post_content    VARCHAR(200) NOT NULL, '.
			'primary key ( post_id ))';

		mysql_select_db('simple_blog_db');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not create table: ' . mysql_error());
		}
		
		/* Make new table for comments */
		$sql = 'CREATE TABLE comments( '.
			'comment_id INT NOT NULL AUTO_INCREMENT, '.
			'post_id INT NOT NULL, '.
			'name VARCHAR(20) NOT NULL, '.
			'email  VARCHAR(20) NOT NULL, '.
			'comment_content    VARCHAR(200) NOT NULL, '.
			'primary key ( comment_id ))';

		mysql_select_db('simple_blog_db');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not create table: ' . mysql_error());
		}		
	}
	mysql_close($conn);
?>