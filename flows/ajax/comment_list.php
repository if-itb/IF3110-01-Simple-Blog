<?php

require_once "flows/works/comment.php";

$comm = new Comment();
$comments = $comm->get($_GET["post_id"]);
if (mysqli_num_rows($comments) > 0) 
{
    while ($comment = mysql_fetch_assoc($comments)) {
?>
                    <li class="art-list-item">
                        <div class="art-list-item-title-and-time">
                            <h2 class="art-list-title"><a href="#"><?php echo $comment["name"]; ?></a></h2>
                            <div class="art-list-time"><?php echo date("l, j F Y", strtotime($comment["date"])); ?></div>
                        </div>
                        <p><?php echo $comment["content"]; ?></p>
                    </li>
<?php
    }
} else 
{
?>
                    <P>No comments have been posted for this post.</p>
<?php
}