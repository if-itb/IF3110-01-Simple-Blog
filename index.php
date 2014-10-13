<?php
	require "db.php";
	$posts = getPosts();
?>
<?php require "header.php"; ?>
<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Yafi's<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="manage_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
          	<?php foreach($posts as $post) : ?>
          	<li class='art-list-item' id='<?=$post['id'];?>'>
                <div class='art-list-item-title-and-time'>
                    <h2 class='art-list-title'><a href='view_post.php?id=<?=$post['id'];?>' ><?=$post['judul'];?></a></h2>
                    <div class="art-list-time"><?=$post['tanggal'];?></div>
                    <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                </div>
                <p><?=$post['konten'];?></p>
                <form action='delete_post.php' method='post' onsubmit="return confirm('Apakah Anda yakin menghapus post ini?')">
                <p>
                  <a href='manage_post.php?id=<?=$post['id'];?>'>Edit</a> | 
                    <input type="hidden" name="id" value="<?=$post['id'];?>"/>
                    <button type="submit" style='border:0; background:none;'/>Hapus</button>
                </p>
                </form>
            </li>
       		<?php endforeach; ?>
          </ul>
        </nav>
    </div>
</div>
<?php require "footer.php"; ?>
</body>
</html>