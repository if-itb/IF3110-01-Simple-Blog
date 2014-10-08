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

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

  <?php include 'templates/header.php'; ?>

  <div id="home">
      <div class="posts">
          <nav class="art-list">
            <ul class="art-list-body">
              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="post.html">Apa itu Simple Blog?</a></h2>
                      <div class="art-list-time">15 Juli 2014</div>
                      <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                  <p>
                    <a href="#">Edit</a> | <a href="#">Hapus</a>
                  </p>
              </li>

              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="post.html">Siapa dibalik Simple Blog?</a></h2>
                      <div class="art-list-time">11 Juli 2014</div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                  <p>
                    <a href="#">Edit</a> | <a href="#">Hapus</a>
                  </p>
              </li>
            </ul>
          </nav>
      </div>
  </div>

  <?php include 'templates/footer.php'; ?>

</div>

</body>
</html>