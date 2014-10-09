<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$judul = $_POST["Judul"];
	$date = $_POST["Tanggal"];
	$konten =$_POST["Konten"];	

    $tanggal = date("Y-m-d", strtotime($date));

	include("db_connect.php");
	$query = 'INSERT INTO post (judul, tanggal, konten) VALUES ("'.$judul.'", "'.$tanggal.'", "'.$konten.'")';
	mysql_query($query);

	header("Location: new_post.php?status=success");
    exit;

}

$title = "Simple Blog | Tambah Post";
include("header.php");
?>


<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
            	<?php if (isset($_GET["status"]) AND $_GET["status"] == "success") { ?>
            	    <p>Post berhasil ditambahkan!</p>
            	<?php } else { ?>

                <form method="post" action="new_post.php">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" placeholder="Judul post">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" placeholder="<?php echo date("d-m-Y"); ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten" placeholder="Konten post"></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button" onclick="return validatePost()">
                </form>
                <?php } ?>
            </div>
        </div>
    </div>

</article>

<?php include("footer.php"); ?>