<?php
// comment_add.php
include 'mysql.php';
date_default_timezone_set('Asia/Jakarta');

$PostID=$_POST['id'];

$query = mysql_safe_query('SELECT * FROM comment WHERE PostID = '.$PostID.';');
while ($row = mysql_fetch_assoc($query)){
	echo '<li class="art-list-item">';
    echo '<div class="art-list-item-title-and-time">';
    echo '<h2 class="art-list-title">'.$row['Name'].' <br> '.$row['Email'].'</h2>';
    echo '<p>'.$row['Comment'].'</p>';
    echo '<p><a href="dcomment.php?ComID='.$row['ComID'].'&PostID='.$row['PostID'].'"> Delete </a></p>';
    echo '</div>';
    echo '</li>';
}

?>