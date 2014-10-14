<?php
    $session_post_id = $_GET['pc'];
    $con=mysqli_connect("localhost","root","","wbd_db");
        $sql="DELETE FROM post WHERE post_id = '$session_post_id'";
        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
    mysqli_close($con);
    header('Location: index.php');
?>