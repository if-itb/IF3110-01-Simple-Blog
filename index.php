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
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<?php
// Create connection
$con=mysqli_connect("Localhost", "root","windy","blogwindy");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM post ORDER BY Tanggal Desc");
?>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php
            while($row = mysqli_fetch_array($result)){
            ?>
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                  
                    <h2 class="art-list-title"><a href="post.php?id=<?php echo $row['id_post']; ?>"> <?php echo $row['Judul']; ?> </a></h2>
                    <div class="art-list-time" id="demo"> <?php echo $row['Tanggal']; ?> </div>
                    
                </div>

                <p> <?php 
                if(strlen($row['Konten']) > 250)
                {
                    echo substr($row['Konten'], 0, 249);
                   echo ' ...</br>';
                } else {
                    echo $row['Konten'];
                } ?></p>
                 <p><a href="edit_post.php?id=<?php echo $row['id_post']; ?>">Edit</a> | <a href="#" onclick="deleteFunction(<?php echo $row['id_post']; ?>)">Hapus</a></p>
            </li> <?php } ?>

            <?php
            mysqli_close($con);
            ?>
          </ul>
        </nav>
    </div>
</div>

<script>
function deleteFunction(id) {
    if (confirm("Apakah Anda yakin menghapus post ini?") == true) {
     location.href=("delete.php?idpost=" +id);
    }
  }
</script>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <div class="psi">Windy Amelia</div>
    <aside class="offsite-links"><a href="https://www.facebook.com/windy.amelia.52" target="_blank">
       <img src="fb.png" style="width:40px;height:40px"></a>
    </aside>
</footer>

</div>

</body>
</html>