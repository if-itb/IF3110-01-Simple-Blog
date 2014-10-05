<?php
	require "db.php";
	$posts = getPosts();
?>
<?php require "header.php"; ?>
<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Muhammad<span>-</span>Yafi</h1></a>
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
                <p>
                  <a href='manage_post.php?id=<?=$post['id'];?>'>Edit</a> | <a onclick='hapusPost(<?=$post['id'];?>)'>Hapus</a>
                </p>
            </li>
       		<?php endforeach; ?>
          </ul>
        </nav>
    </div>
</div>
<?php require "footer.php"; ?>
<script type="text/javascript">
	function hapusPost(id){
		if (confirm("Apakah Anda yakin menghapus post ini?")){
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST","delete.php",true);
			var params = JSON.stringify({"id" : id});

			xmlhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
			xmlhttp.setRequestHeader("Content-length", params.length);
			xmlhttp.setRequestHeader("Connection", "close");

			xmlhttp.onreadystatechange = function (){
				if (xml.readyState == 4 && xmlhttp.status == 200){
					document.getElementById(""+id).style.visible = "none";
				}
			}
		}
	}
</script>
</body>
</html>