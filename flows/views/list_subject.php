<?php
    require_once "flows/works/post.php";
    require_once "flows/assists/url.php";
    
    $postm = new Post();
    
    $posts = $postm->get();
    
    require "flows/templates/header.php";
?>

    <div id="home">
        <div class="posts">
            <nav class="art-list">
                <ul class="art-list-body">
<?php 
    $i = 0;
    while ($post = mysqli_fetch_assoc($posts)) 
    { 
?>    
                    <li class="art-list-item">
                        <div class="art-list-item-title-and-time">
                            <h2 class="art-list-title"><a href="post.html"><?php echo $post["title"]; ?></a></h2>
                            <div class="art-list-time"><?php echo date("l, j F Y", strtotime($post["date"])); ?></div>
                        </div>
                        <p>
                            <?php echo html_entity_decode($post["content"]); ?>
                        </p>
                        <p>
                          <a href="<?php echo URL::view_post($post["id"]); ?>">Lihat</a> | <a href="<?php echo URL::edit_post($post["id"]); ?>">Sunting</a> | <a href="<?php echo URL::delete_post($post["id"]); ?>">Hapus</a>
                        </p>
                    </li>
<?php
        $i++;
    }
?>
                </ul>
            </nav>
        </div>
    </div>

<?php require "flows/templates/footer.php"; ?>