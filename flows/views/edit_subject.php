<?php

require_once "flows/works/post.php";
require_once "flows/assists/url.php";

$postm = new Post();

if (isset($_GET["id"]))
{
    // We are in editing mode
    $id = $_GET["id"];
    $post = mysqli_fetch_assoc($postm->get($id));
    
    $post_title  = $post["title"];
    $post_target = URL::make("actions", "edit_post");
    $post_date   = $post["date"];
    $post_content= $post["content"];
    
    $mode        = "Edit Post";
} else 
{
    // We are in new post mode
    $post_title  = "";
    $post_target = URL::make("actions", "add_post");
    $post_date   = date("Y-m-d");
    $post_content= "";
    
    $mode        = "Tambah Post";
    
}

require "flows/templates/header.php";

?>
    <article class="art simple post">
        <h2 class="art-title" style="margin-bottom:40px">-</h2>

        <div class="art-body">
            <div class="art-body-inner">
                <h2><?php echo $mode; ?></h2>

                <div id="contact-area">
                    <form method="post" action="<?php echo $post_target; ?>">
                        <label for="title">Judul:</label>
                        <input type="text" name="title" id="Judul" value="<?php echo $post_title; ?>" placeholder="Title" required>

                        <label for="date">Tanggal:</label>
                        <input type="text" name="date" id="Tanggal" value="<?php echo $post_date; ?>" placeholder="Date" required>
                        
                        <label for="content">Konten:</label><br>
                        <textarea name="content" rows="20" cols="20" id="Konten"><?php echo $post_content; ?></textarea>
                        
<?php if (isset($_GET["id"])) { ?>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
<?php } ?>

                        <input type="submit" name="submit" value="Simpan" class="submit-button">
                    </form>
                </div>
            </div>
        </div>
    </article>
    
<?php require "flows/templates/footer.php"; ?>