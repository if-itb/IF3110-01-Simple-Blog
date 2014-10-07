<!DOCTYPE html>
<html>
<?php require 'blog/header.php'; ?>

<body class="default">
<div class="wrapper">

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form method="post" action="blog/tambahpost.php">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" name="Tanggal" id="Tanggal">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>


</article>

<?php include 'blog/footer.php' ;?>
</html>