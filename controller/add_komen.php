<?php
require_once(dirname(__FILE__)."/../model/komentar.php");
if (isset($_POST['id_post'])&&isset($_POST['nama'])&&isset($_POST['email'])&&isset($_POST['komentar']))
{
    $data = array (
        'id_post' => $_POST['id_post'],
        'nama' => $_POST['nama'],
        'time' => date("Y-m-d H:i:s"),
        'email' => $_POST['email'],
        'komentar' => $_POST['komentar']
    );
    $post = new Komentar();
    $action = $post->AddKomen($data);
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
