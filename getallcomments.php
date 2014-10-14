<?PHP
include("getallposts.php");

$table 	= "comments";
$sql	= "SELECT * FROM $table WHERE id_post = '$_GET[id]' ORDER BY tanggal_komentar DESC";
$result	= mysql_query($sql);
$viewComment = "";
while($row = mysql_fetch_array($result)){
$viewComment.="<li class='art-list-item'>"
			."<div class='art-list-item-title-and-time'>"
			."<h2 class='art-list-title'>"
			.$row['nama']
			."</h2>"
			."<div class='art-list-time'>"
			.$row['tanggal_komentar']
			."</div>"
			."</div>"
			."<p>"
			.$row['isi_komentar']
			."</p>"
			."</li>";
}
echo $viewComment;
?>