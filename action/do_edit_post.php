<?php
//------------------------do_edit_post.php-------------------
include "../config/configuration.php";

// echo mysql_error($dbConnect);
// echo $id;

function check_input($value)
	{
		return addslashes($value);
	}

$user_option = check_input($_POST["user_option"]);
$id = check_input($_POST["id"]);
if ($user_option=='edit'){	
	$judul =  check_input($_POST['judul']);
	$tanggal =  check_input($_POST['tanggal']);
	$your_date = date("Y-m-d", strtotime($tanggal));
	$konten =  check_input($_POST['konten']);

	if($user_option=="" OR $id=="" OR $judul=="" OR $your_date=="" OR $konten==""){
		echo "Semua field harus diisi";    
	} else {
			$data = mysql_query("UPDATE `post` SET `judul`='".$judul."',`tanggal`='".$your_date."',`konten`='".$konten."' WHERE `id`='$id'");
			if($data){
?>
		<ul class="art-list-body">		
			<li class="art-list-item">
	            <div class="art-list-item-title-and-time">
	                <h2 class="art-list-title"><a href="post.php?id=<?php echo $id;?>">
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
} else {
		$id = $_GET["id"];
		$data = mysql_query("DELETE FROM `post` WHERE `id`='$id'");
		if($data){
			header("Location:../index.php?msg=Post Berhasil Dihapus");
		} else {			
			header("Location:../index.php?msg=Post Gagal Dihapus");	
		}
}

?>