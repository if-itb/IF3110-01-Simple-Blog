<!DOCTYPE html>
<html>
<?php 
    include '../template/header.php'; 
    $data = array();
    $data = getID($_GET['id']);

    $komentar = $data[3];
    $split = explode(",", $komentar);

?>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo convertDate($data[1]) ?></time>
            <h2 class="art-title"><?php echo $data[0] ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr />
            
            <?php echo $data[2]?>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama" onkeyup="validateForm2()">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" onkeyup="loadXMLDoc(this.value)" onblur="loadXMLDoc(this.value)">
                    <span id="msg"></span>
                    
                    <label for="Komentar" id="komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar" onkeyup="validateForm2()"></textarea>

                    <input type="button" id="submit" name="submit" value="Kirim" class="submit-button" onclick="add_comment(Email.value,Nama.value,Komentar.value,<?php echo $_GET['id'] ?>)" disabled>
                    <input type="button" id="see" value="Lihat Komentar" class="submit-button" onclick="lihat_komentar(<?php echo $_GET['id'] ?>)">
                </form>
            </div>

            <ul class="art-list-body" id="komen">

            </ul>
        </div>
    </div>

</article>

<?php include '../template/footer.php'; ?>
</html>