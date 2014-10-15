<?php
    require_once "flows/works/post.php";
    require_once "flows/assists/url.php";
    
    $postm = new Post();
    
    $id    = "";
    if ($_GET["do"] == "random")
    {
        $id    = $postm->get_random_id();
    } else
    {
        $id    = $_GET["id"];
    }
    $post  = mysqli_fetch_assoc($postm->get($id));
    
    require "flows/templates/header.php";
?>
<?php 
    if (isset($_GET["add"])) 
    { 
        if ($_GET["add"] == "1") 
        {
?>
    <div class="view-message"id="message-addpost">Post <b><?php echo $post["title"]; ?></b> has been successfully added.</div>
<?php   }
    }
?>
<?php 
    if (isset($_GET["edit"])) 
    { 
        if ($_GET["edit"] == "1") 
        {
?>
    <div class="view-message"id="message-addpost">Post <b><?php echo $post["title"]; ?></b> has been successfully edited.</div>
<?php   }
    }
?>
    <article class="art simple post">
        <header class="art-header">
            <div class="art-header-inner">
                <time class="art-time"><?php echo date("l<b\\r>j F Y", strtotime($post["date"])) ?></time>
                <h2 class="art-title"><?php echo $post["title"] ?></h2>
                <p class="art-subtitle">
                    <a href="<?php echo URL::edit_post($id); ?>">Edit Post</a> | <a href="<?php echo URL::delete_post($post["id"]); ?>">Delete Post</a>
                </p>
            </div>
        </header>
        <div class="art-body">
            <div class="art-body-inner">
                <hr />
                <p>
                    <?php echo html_entity_decode($post["content"]); ?>
                </p>

                <hr />
                
                <h2>Komentar</h2>

                <div id="contact-area">
                    <form method="post" name="comment" target="">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="Nama" required>
            
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="Email" required>
                        
                        <label for="content">Komentar:</label><br>
                        <textarea name="content" rows="20" cols="20" id="Komentar" required></textarea>
                        
                        <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" />
                        <input type="hidden" name="post_id" value="<?php echo $id ?>">

                        <input type="submit" name="submit" value="Kirim" class="submit-button">
                    </form>
                </div>

                <ul class="art-list-body" id="comments-root">
                
                    
                    
                </ul>
            </div>
        </div>
    </article>
    
    <script type="text/javascript">
        var comment_list_url = "<?php echo URL::get(array("action" => "comment_list", "post_id" => $id)); ?>";
        var comment_add_url  = "<?php echo URL::get(array("action" => "comment_add", "post_id" => $id)); ?>";
    </script>
<?php require "flows/templates/footer.php"; ?>