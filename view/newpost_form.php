<!DOCTYPE html>
<html>
<?php require '../template/header.php'; ?>

<body class="default">
<div class="wrapper">

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form method="post" action="../function/tambahpost.php">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" onkeyup="validateForm()">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" name="Tanggal" id="Tanggal" onchange="validateDate(this.value)" onblur="validateForm()">
                    <div id="msg2"></div>
                   
                    <label for="Konten" id="konten">Konten:</label>
                    <textarea name="Konten" rows="20" cols="20" id="Konten" onkeyup="validateForm()"></textarea>

                    <input type="submit" name="submit" id="submit" value="Simpan" class="submit-button" disabled>
                </form>
            </div>
        </div>


</article>

<?php include '../template/footer.php' ;?>
</html>