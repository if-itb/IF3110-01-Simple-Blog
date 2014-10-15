<?php

require_once "flows/works/post.php";
require_once "flows/assists/url.php";

$postm = new Post();

$id    = $_GET["id"];
$post  = mysqli_fetch_assoc($postm->get($id));

$postm->delete($id);

require "flows/templates/header.php";

?>
        <div id="home">
            <div class="posts">
                <nav class="art-list">
                    <ul class="art-list-body">
                        <li class="art-list-item">
                            <div class="art-list-item-title-and-time">
                                <h2 class="art-list-title">Post has been deleted</h2>
                                <div class="art-list-time"><a href="<?php echo URL::get(); ?>">Back to Homepage</a></div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

<?php require "flows/templates/footer.php"; ?>