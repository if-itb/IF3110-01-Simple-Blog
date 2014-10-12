<?php
	//eliminate every HTML and PHP tags
	$title = str_replace('>', '&gt;',str_replace('<', '&lt;', $_POST['Judul']));
	$pid = $_POST['pid'];
	if($_POST['Tanggal'])
	{
		$dummy_date = explode('/',$_POST['Tanggal']);
		$day = $dummy_date[0];
		$month = $dummy_date[1];
		$year = $dummy_date[2];
	}
	else
	{
		$day = date("d");
		$month = date("m");
		$year = date("Y");
	}
	//eliminate < and > then change newline to <br>
	$content = nl2br(str_replace('<', '&lt;', str_replace('>', '&gt;', $_POST['Konten'])));

	if(isset($_POST['Featured']))
	{
		$featured = 1;
	}else
	{
		$featured = 0;
	}

	//post to db
	//connect mysql
	$mysql = mysql_connect("localhost","root","");
	if(!$mysql)
	{
		die('DB Ngga bisa dibuka : ' . mysql_error());
	}
	//select db
	mysql_select_db("simple_blog",$mysql);
	//insert
	$date = $year . "-" . $month . "-" . $day;
	$sql = "UPDATE `simple_blog`.`sb_post` SET `post_date` = '$date', `post_title` = '$title', `post_content` = '$content', `is_featured` = $featured WHERE `post_id` = " . $pid;
	mysql_query($sql);
	//close db
	mysql_close($mysql);
	//redirect to homepage
	header('Location:' . dirname($_SERVER[HTTP_HOST]));
?>
