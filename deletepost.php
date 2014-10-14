<?php
    header("Location: index.php");
    $con=mysqli_connect("localhost", "root", "chmod777", "blog");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " .mysqli_connect_error();
    }

    $id = $_GET['id'];
    $sql="DELETE FROM post_table WHERE id=$id";

    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
?>
