<?php
    header("Location: index.php");
    $con=mysqli_connect("localhost", "root", "chmod777", "blog");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " .mysqli_connect_error();
    }
    $title = mysqli_real_escape_string($con, $_POST['Judul']);
    $date = mysqli_real_escape_string($con, $_POST['Tanggal']);
    $content = mysqli_real_escape_string($con, $_POST['Konten']);
    $sql="INSERT INTO post_table (title, date, content)
    VALUES ('$title', '$date', '$content')";

    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
?>
