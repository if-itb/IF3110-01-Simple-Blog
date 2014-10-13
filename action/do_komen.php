<?php
//------------------------do_komen.php-------------------
include "../config/configuration.php";

function check_input($value)
{
	return addslashes($value);
}

$id =  check_input($_POST['id']);
$nama =  check_input($_POST['nama']);
$waktu =  check_input($_POST['waktu']);
$your_date = date("Y-m-d", strtotime($waktu));
$email =  check_input($_POST['email']);
$komentar =  check_input($_POST['komentar']);

if($id=="" OR $nama=="" OR $your_date=="" OR $email=="" OR $komentar==""){
    	echo "Semua field harus diisi";    
}
else {
	echo mysql_error($dbConnect);
	$data = mysql_query("INSERT INTO `komentar`(`idterkait`, `nama`,  `waktu`,  `email`,  `komentar`)
		VALUES ('".$id."', '".$nama."', '".$your_date."', '".$email."', '".$komentar."')");
	if($data){
		$datakomen = mysql_query("select * from komentar where idterkait='$id' ");
	    
?>
		<ul class="art-list-body">
		<?php
            while ($hasilkomen = mysql_fetch_array($datakomen)) {                                    
        ?>
			<li class="art-list-item">
	            <div class="art-list-item-title-and-time">
	                <h2 class="art-list-title"><a href="post.php">
	                	<?php echo $hasilkomen['nama']; ?>
	                </a></h2>
	                <div class="art-list-time">
	                	<?php echo $hasilkomen['waktu']; ?>
	                </div>
	            </div>
	            <p>
	            	<?php echo $hasilkomen['komentar']; ?>
	            &hellip;</p>
	        </li>
	    <?php 
	        }
	        mysql_close();
	    ?>
        </ul>
    <?php
	} else {      
      	echo "Komentar gagal ditambahkan"; 
    }
}
?>