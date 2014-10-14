<?php  
require_once 'config.php';

$id = req_handler('id');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nama = req_handler('nama');
	$email = req_handler('email');
	$komentar = req_handler('komentar');
	
	$now = time();
	
	db_execute("INSERT INTO `komentar` (`id_komentar`, `id_post`, `nama`, `email`, `stamp`, `komentar`) VALUES (NULL, '$id', '$nama', '$email', '$now', '$komentar');");
}

$komen = db_fetchs("SELECT * FROM `komentar` WHERE id_post='$id';");

for ($i = 1; $i <= $komen[0]; $i++){
	

?>
			<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><?php echo $komen[$i]['nama']; ?></h2>
                        <div class="art-list-time"><?php if ((time() - $komen[$i]['stamp'])/60 < 60) echo intval((time() - $komen[$i]['stamp'])/60) . " menit yang lalu"; else echo date('j F Y - H:i', $komen[$i]['stamp']); ?></div>
                    </div>
                    <p><?php echo $komen[$i]['komentar']; ?></p>
                </li>
<?php }