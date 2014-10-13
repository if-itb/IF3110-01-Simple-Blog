<?php
    $id =$_GET['id'];
    include 'function.php';
    Hapus_Post($id);

    # Redirect to home
    header('Location: index.php');
?>