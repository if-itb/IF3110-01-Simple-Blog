<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $judul = $_POST["Judul"];
    $date = trim($_POST["Tanggal"]);
    $konten =$_POST["Konten"];  

    $tanggal = date("Y-m-d", strtotime($date));

    include("db_connect.php");
    $query = 'UPDATE post SET judul="'.$judul.'", tanggal="'.$tanggal.'", konten="'.$konten.'" WHERE  id="'.$id.'"';
    mysql_query($query);

    $url = "post.php?id=".$id;

    header("Location: $url");
    exit;

} else {

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
        
    } else {
        
        $post = mysql_fetch_array($result);
    }

}

$title = "Simple Blog | Edit Post";
include("header.php");
?>


<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>

            <div id="contact-area">
                <form method="post" action="edit.php">
                    <input type="hidden" id="id" name="id" value="<?php echo $post['id']; ?>" >
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $post['judul']; ?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="<?php echo date("d-m-Y", strtotime($post['tanggal'])); ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $post['konten']; ?></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button" onclick="return validatePost()">
                </form>
            </div>
        </div>
    </div>

</article>

<?php include("footer.php"); ?>