<?php
    $comment_id = uniqid();
    $nama = $_POST['Nama'];
    $post_id = $_POST['post_id'];
    $comment_date = $_POST['comment_date'];
    $komentar = $_POST['Komentar'];
    $email = $_POST['Email'];
    $con = mysqli_connect("localhost","root","","wbd_db");
    $sql="INSERT INTO `comment` (`post_id`, `comment_id`, `email`, `nama`, `komentar`, `comment_date`) VALUES ('$post_id','$comment_id','$email','$nama','$komentar','$comment_date')";
    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
    echo '<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.html">'.$nama.'</a></h2>
                        <div class="art-list-time">'.$comment_date.'</div>
                    </div>
                    <p>'.$komentar.'</p>
                </li>';
?>