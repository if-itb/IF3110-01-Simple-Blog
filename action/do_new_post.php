
<?php
//------------------------do_new_post.php-------------------
include "../config/configuration.php";

function check_input($value)
{
	return addslashes($value);
}

$judul =  check_input($_POST['judul']);
$tanggal =  check_input($_POST['tanggal']);
$your_date = date("Y-m-d", strtotime($tanggal));
$konten =  check_input($_POST['konten']);

if($judul=="" OR $your_date=="" OR $konten==""){
	echo "Semua field harus diisi";    
}
else {

	$data = mysql_query("INSERT INTO `post`(`judul`,  `tanggal`,  `konten`) VALUES
                                       ('".$judul."', '".$your_date."', '".$konten."')");
	if($data){
?>
		<ul class="art-list-body">		
			<li class="art-list-item">
	            <div class="art-list-item-title-and-time">
	                <h2 class="art-list-title"><a href="#">
	                	<?php echo $judul; ?>
	                </a></h2>
	                <div class="art-list-time">
	                	<?php echo $your_date; ?>
	                </div>
	            </div>
	            <p>
	            	<?php echo $konten; ?>
	            &hellip;</p>
	        </li>        
        </ul>
<?php
	} else {      
      	echo "Post Gagal Ditambahkan"; 
    }
}
?>