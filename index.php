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

<?php include 'header.php';?>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
			<?php
				$con=mysqli_connect("localhost","root","","simple_blog");
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			
				$result = mysqli_query($con,"SELECT * FROM post");
				while($row = mysqli_fetch_array($result)) {
					echo "<li class='art-list-item'>";
						echo "<div class='art-list-item-title-and-time'>";
							echo "<h2 class='art-list-title'><a href='view_post.php?id=" . $row['id'] . "'>". $row['title'] ."</a></h2>";
							echo "<div class='art-list-time'>".date("d F Y",strtotime($row['date'])) ."</div>";
							echo "<div class='art-list-time'><span style='color:#F40034;'>&#10029;</span> Featured</div>";
						echo "</div>";
						echo "<p>". substr ( $row['content'] , 0, 320) ."&hellip;</p>";
						echo "<p><a href='edit_post.php?id=" . $row['id'] . "'>Edit</a> | <a onclick='return confirm(\"Apakah Anda yakin menghapus post ini?\")' href='delete_post.php?id=" . $row['id'] . "'>Hapus</a></p>";
					echo "</li>";
				}
				mysqli_close($con);
			?>
          </ul>
        </nav>
    </div>
</div>

<?php include 'footer.php';?>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>

</body>
</html>