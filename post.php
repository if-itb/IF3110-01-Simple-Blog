<?php 

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
} else {
    $id = $_GET["id"];
}

include("db_connect.php");

$query = "SELECT * FROM post WHERE id='".$id."'";
$result = mysql_query($query);

if (mysql_num_rows($result) == 0) {
    $isPostExist = false;
} else {
    $isPostExist = true;
    $post = mysql_fetch_array($result);
}


$title = "Simple Blog | " . $post['judul'];
include("header.php");
?>


<article class="art simple post">

    <?php 
        if (!$isPostExist) { ?>

            <header class="art-header">
                <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
                    <h3 class="art-title">The post is not found</h3>
                    <p class="art-subtitle"></p>
                </div>
            </header>
            <div class="art-body">
                 
            </div>


    <?php    } else {
    ?>
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $post['tanggal']; ?></time>
            <h2 class="art-title"><?php echo $post['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <!-- <hr class="featured-article" /> -->
            <p><?php echo $post['konten']; ?></p>
            

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="#" onsubmit="return addComment()">
                    <input type="hidden" id="id_post" name="id_post" value="<?php echo $post['id']; ?>" >
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
                    <span id="namaerror" style="margin-left: 115px;font-size: 15px;color: red;"></span><br>

                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    <span id="emailerror" style="margin-left: 115px;font-size: 15px;color: red;"></span><br>

                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
                    <span id="komentarerror" style="margin-left: 115px;font-size: 15px;color: red;"></span><br>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id="comments-area">
                
            </ul>
        </div>
    </div>

    <?php } ?>

</article>



<?php 
$isLoadComments = true;
include("footer.php");
?>