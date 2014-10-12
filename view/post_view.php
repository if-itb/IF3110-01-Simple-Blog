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
            <hr class="featured-article" />
            <?php echo $data[2]?>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" onblur="loadXMLDoc(this.value)">
                    <span id="msg"></span>
                    
                    <label for="Komentar" id="komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="add_comment(Email.value,Nama.value,Komentar.value,<?php echo $_GET['id'] ?>)">
                </form>
            </div>

            <ul class="art-list-body">
                <li class="art-list-item" id="komen_baru">

                </li>
                <?php for($i=sizeof($split)-2;$i>1;$i--){ $currdata = getData($split[$i]);?>
                <li class="art-list-item" id="komen_view">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><?php echo $currdata[0];?></h2>
                        <div class="art-list-time"><?php echo $currdata[1];?></div>
                    </div>
                    <p><?php echo $currdata[2];?></p>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>

</article>

<?php include '../template/footer.php'; ?>
</html>