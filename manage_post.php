<?php
    require 'db.php';
    $post = array('judul' => '','tanggal' => '', 'konten' => '');
    if (isset($_POST['id'])){
        //update post
        if ($_POST['id'] != 0){
            //update post
            setPost($_POST);
            header("location:view_post.php?id=".$_POST['id']);
        } else {
            //new post
            setPost($_POST);
            header("location:index.php");
        }
    } else if (isset($_GET['id'])) {
        $post = getPost($_GET['id']);
    } else {
        //new post, do nothing
    }
?>
<?php require 'header.php'; ?>
<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="edit_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2><?=isset($_GET['id'])?"Ubah":"Tambah";?> Post</h2>

            <div id="contact-area">
                <form method="post" action="#">
                    <input type="hidden" name="id" value='<?=isset($_GET['id'])?$_GET['id']:0;?>'>

                    <label for="Judul">Judul:</label>
                    <input type="text" name="judul" id="Judul" value='<?=$post['judul'];?>'>

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="tanggal" id="Tanggal" value='<?=$post['tanggal'];?>'>
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="konten" rows="20" cols="20" id="Konten"><?=$post['konten'];?></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>
</div>
<?php require 'footer.php'; ?>
</body>
</html>