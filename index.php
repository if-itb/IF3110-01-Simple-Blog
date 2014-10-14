
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<title>Simple Blog</title>

</head>

<body class="default">
<?php
//create connection
$con=mysqli_connect("localhost","root","asdasd123","blog");

//check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM post ORDER BY tanggal DESC");
?>
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><img src="assets/img/blogicon.png"></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
          <?php
          while($row = mysqli_fetch_array($result)) { ?>
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.php?id_post=<?php echo $row['id_post']; ?>"><?php
                    echo $row['judul'];
                    ?></a></h2>
                    <div class="art-list-time"><?php
                    echo $row['tanggal'];
                    ?></div>
                    <div class="art-list-time"><span style="color:#eb7560;">&#10029;</span> Featured</div>
                </div>
                <p><?php
                if (strlen($row['content']) > 200) {
                  echo substr($row['content'], 0, 199);
                  echo ' ...<br/>';
                  echo '<a href="post.php?id_post=' . $row['id_post'] .'">Continue Reading</a>';
                }
                else {
                  echo $row['content'];
                }
                ?>
                <br/>
                  <a href="edit_post.php?id_post=<?php echo $row['id_post']; ?>">Edit</a> | <a href="#" onclick="myFunction(<?php echo $row['id_post']; ?>)">Hapus</a>
                </p>
            </li>
            <?php
            } ?>
          </ul>
        </nav>
    </div>
</div>
<script>
function myFunction(idpost) {
  if (confirm("Apakah Anda yakin postingan dihapus?") == true){
    location.href="delete.php?id_delete="+idpost;
  }
}
</script>
<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <aside class="offsite-links">
    <a href="https://twitter.com/vidianindhita"><img src="assets/img/twitter.png"></a>
    <a href="https://www.facebook.com/vanindhita"><img src="assets/img/facebook.png"></a>
    </aside>
</footer>

</div>
</body>
</html>