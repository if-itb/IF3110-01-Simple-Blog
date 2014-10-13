<?php
require_once(dirname(__FILE__)."/../model/post.php");
if (isset($_POST['id']))
{
    $post = new Post();
    $action = $post->DelPost($_POST['id']);
    if ($action)
    {
        echo "true";
    }
    else
    {
        echo "false";
    }
}
?>
