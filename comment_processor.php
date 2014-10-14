<?php
//open connection to db
$db_post = mysqli_connect('localhost','root', "", 'simpleblog');

//get from param
$id = $_GET["id"];

$query = "SELECT * FROM `commentlist` WHERE Idx_post=".$id." ORDER BY `Waktu` DESC";
$results_comment = mysqli_query($db_post, $query);	

foreach ($results_comment as $result)
{
echo "
	<li class=\"art-list-item\">
		<div class=\"art-list-item-title-and-time\">
			<h2 class=\"art-list-title\">".$result['Nama'] ."</h2> ";
				$date = date_create($result['Waktu']);
echo "				
			<div class=\"art-list-time\">". date_format($date, 'g:ia \o\n l jS F Y') ."</div>
		</div>
		<p>".$result['Komentar'] ."</p>
	</li>
	";
} 
	
mysqli_close($db_post);	

?>