<?php
    require "db_handler.php";
  if (!isset($_GET['post_id'])){
    throw new Exception("Missing parameter: id");
  }
    $post = getPost($_GET['post_id']);
?>
<?php require "header.php"; ?>
<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Tirta<span>-</span>Wening<span>-</span>Rachman</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?=$post['post_date'];?></time>
            <h2 class="art-title"><?=$post['post_title'];?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?=$post['post_content'];?></p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
              <div id="error-message">
              </div>
                <form method="post" action="#" name="komentar">
                    <input type="hidden" name="post_id" value="<?=$post['post_id'];?>"/>
                    <label for="Nama">Nama:</label>
                    <input type="text" name="nama" id="nama">
        
                    <label for="Email">Email:</label>
                    <input type="email" name="email" id="email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="komentar" rows="20" cols="20" id="komentar"></textarea>

                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="addComment(<?=$post['post_id'];?>)">
                </form>

            </div>

            <ul class="art-list-body" id='comments'>
                <p>Komentar - komentarnya harusnya ada di sini</p>
                
            </ul>
        </div>
    </div>

</article>
</div>
<?php require "footer.php"; ?>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

<script type="text/javascript">
    


  function getComments(post_id){
    http = new XMLHttpRequest();
    http.open("GET","get_comments.php?post_id="+post_id,true);

    http.onreadystatechange = function(){
      if (http.readyState == 4 && http.status == 200){
        console.log(http.responseText);
        document.getElementById('comments').innerHTML = http.responseText;
      }
    }
    http.send();
  }

  function addComment(post_id){
    //alert("oy");
    if(validateEmail()){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","add_comment.php",true);
       
        var form  = "";//new FormData();
        form += "post_id=" + document.forms['komentar']['post_id'].value;
        form += "&name=" + document.forms['komentar']['nama'].value;
        form += "&email=" + document.forms['komentar']['email'].value;
        form += "&post_comment=" + document.forms['komentar']['komentar'].value;
        //alert(form);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(form);

        xmlhttp.onreadystatechange = function (){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                alert("Udah neh")
              getComments(post_id);}
        }
    }
     
  }

  function validateEmail(){
    var x = document.forms['komentar']['email'].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
      alert("Emailnya yang bener dong");
      return false;
    } else {
      return true;
    }
  }

  getComments(<?=$post['post_id'];?>);

</script>
</body>
</html>