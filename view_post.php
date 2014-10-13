<?php
	require "db.php";
  if (!isset($_GET['id'])){
    throw new Exception("Missing parameter: id");
  }
	$post = getPost($_GET['id']);
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

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?=$post['tanggal'];?></time>
            <h2 class="art-title"><?=$post['judul'];?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?=$post['konten'];?></p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
              <div id="error-message">
              </div>
                <form method="post" action="#" name="komentar">
                    <input type="hidden" name="post_id" value="<?=$post['id'];?>"/>
                    <label for="Nama">Nama:</label>
                    <input type="text" name="nama" id="nama">
        
                    <label for="Email">Email:</label>
                    <input type="email" name="email" id="email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="komentar" rows="20" cols="20" id="komentar"></textarea>

                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="addComment(<?=$post['id'];?>)">
                </form>

            </div>

            <ul class="art-list-body" id='comments'>
            </ul>
        </div>
    </div>

</article>
</div>
<?php require "footer.php"; ?>
<script type="text/javascript">
  function getComments(post_id){
    http = new XMLHttpRequest();
    http.open("GET","get_comment.php?post_id="+post_id,true);

    http.onreadystatechange = function(){
      if (http.readyState == 4 && http.status == 200){
        //console.log(http.responseText);
        document.getElementById('comments').innerHTML = http.responseText;
      }
    }
    http.send();
  }

  function validateEmail(){
    var x = document.forms['komentar']['email'].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
      alert("Silakan masukkan email yang benar");
      return false;
    } else {
      return true;
    }
  }

  function addComment(post_id){
    if (validateEmail()){
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST","add_comment.php",true);
      var params = "post_id="+post_id;
      var form  = new FormData();
      form.append("post_id",document.forms['komentar']['post_id'].value);
     form.append("nama",document.forms['komentar']['nama'].value);
     form.append("komentar",document.forms['komentar']['komentar'].value);
     form.append("email",document.forms['komentar']['email'].value);

      //xmlhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
      //xmlhttp.setRequestHeader("Content-length", params.length);
      //xmlhttp.setRequestHeader("Connection", "close");

      xmlhttp.onreadystatechange = function (){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
          getComments(post_id);
        }
      }
      xmlhttp.send(form);
    } 
  }

  function makeComment(nama,tanggal,komentar){/*
    return "<ul class='art-list-body'>
                <li class='art-list-item'>
                    <div class='art-list-item-title-and-time'>
                        <h2 class='art-list-title'><a href='index.php'>"+nama+"</a></h2>
                        <div class='art-list-time'>"+tanggal+"</div>
                    </div>
                    <p>"+komentar+"</p>
                </li>
            </ul>";*/
  }
  getComments(<?=$_GET['id'];?>);
</script>
</body>
</html>