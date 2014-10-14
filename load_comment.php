<?php
	include ("mysql.php");
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') // if comment is updated
	{
		mysql_safe_query('INSERT INTO comment (post_id,name,email,content,date) VALUES (%s,%s,%s,%s,%s)', 
						       $_POST['ID'], $_POST['Name'],$_POST['Email'],$_POST['Comment'],time());
		$query = mysql_safe_query("SELECT * FROM comment WHERE post_id = " . $_POST['ID']);
	}				   
	else // if comment is loaded first
	{
		$query = mysql_safe_query("SELECT * FROM comment WHERE post_id = " . $_GET['id']);
	}
	
	while ($data = mysql_fetch_row($query))
	{
		echo '<ul class="art-list-body">
				<li class="art-list-item">
						<div class="art-list-item-title-and-time">
						<h2 class="art-list-title">'.$data[2].'</h2>
						<div class="art-list-time">';
		
		$deltaTime = (time() - $data[5]);
		if ($deltaTime < 60)
		{
			echo intval($deltaTime).' seconds ago';
		}
		else if ($deltaTime < 3600)
		{
			echo intval($deltaTime/60).' minutes ago';
		}
		else
		{
			echo date('j F Y H:i',$deltaTime);
		}
		
		echo '</div>
					</div>
					<p>'.nl2br($data[4]).'</p>
				</li>
			</ul>';
	}
?>