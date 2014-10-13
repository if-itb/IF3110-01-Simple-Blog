<?php
include 'mysql.php';
include 'phpfunction.php';
$id_post = $_GET['id'];
?>

<ul class="art-list-body">
    <?php
    $thecomments = $con->prepare("SELECT nama, tanggal, komentar FROM comments WHERE comments.id_post = '$id_post' ORDER BY tanggal, id_comment DESC");
    $thecomments->execute();
    $thecomments->bind_result($cnama, $ctanggal, $ckomentar);
    while ($thecomments->fetch()):
    ?>
    <li class="art-list-item">
        <div class="art-list-item-title-and-time">
            <h2 class="art-list-title"><a href="post.php"><?php echo $cnama; ?></a></h2>
            <div class="art-list-time"><?php echo StrTanggal($ctanggal); ?></div>
        </div>
        <p><?php echo $ckomentar; ?> &hellip;</p>
    </li>
    <?php endwhile?>
</ul>