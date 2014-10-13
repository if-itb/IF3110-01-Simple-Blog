<?php
require_once(dirname(__FILE__)."/../model/post.php");
if (isset($_POST['id'])&&isset($_POST['judul'])&&isset($_POST['tanggal'])&&isset($_POST['konten']))
{
    $data = array (
        'judul' => $_POST['judul'],
        'tanggal' => $_POST['tanggal'],
        'konten' => $_POST['konten']
    );
    $post = new Post();
    $action = $post->EditPost($data,$_POST['id']);
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
