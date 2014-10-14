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

<?php include 'init.php';?>
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
				$db = new mysqli($db_loc,$db_user,$db_pass,$db_name);
				if (mysqli_connect_errno()){
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$result = $db->query("SELECT Count(*) AS a FROM post;");
				$res = $result->fetch_array(MYSQLI_ASSOC);
				$pg_max=0;
				$pg_max=$res['a'];
				if ($pg_max>0){
					$bulan=["JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER"];
					if ($paging){
						$result = $db->query("SELECT * FROM post ORDER BY Date DESC LIMIT ".$NUMPERPAGES." OFFSET ".($pg_num-1)*$NUMPERPAGES.";");
					} else {
						$result = $db->query("SELECT * FROM post ORDER BY Date DESC;");
					}
					$tp2=mysqli_num_rows($result);
					if ($tp2>0){
						while($res = $result->fetch_array(MYSQLI_ASSOC)){
							$tgl=strtotime($res['Date']);
							echo "
							<li class=\"art-list-item\">
								<div class=\"art-list-item-title-and-time\">
									<h2 class=\"art-list-title\"><a href=\"post.php?id=".$res['ID']."\">".$res['Title']."</a></h2>
									<div class=\"art-list-time\">".date('j',$tgl)." ".$bulan[date('n',$tgl)-1]." ".date('Y',$tgl)."</div>
								</div>
								<p>".mb_strimwidth($res['Content'],0,265,"&hellip;<a href=\"post.php?id=".$res['ID']."\">Read More</a>")."</p>
								<p>
								  <a href=\"edit.php?id=".$res['ID']."\">Edit</a> | <a href=\"proc.php?x=3&id=".$res['ID']."\" onclick=\"return DeletePost();\">Hapus</a>
								</p>
							</li>";
						}
					} else {
						echo "
						<li class=\"art-list-item\">
							<div class=\"art-list-item-title-and-time\">
								<h2 class=\"art-list-title\"><a href=\"new_post.php\">Invalid Page</a></h2>
							</div>
							<p>There is no post here yet!<br><br>Why don't you fill it until it reach here?</p>
						</li>";
					}
				} else {
					echo "
					<li class=\"art-list-item\">
						<div class=\"art-list-item-title-and-time\">
							<h2 class=\"art-list-title\"><a href=\"new_post.php\">Empty Blog!</a></h2>
						</div>
						<p>There is no post yet!<br><br>Create a post and fill this blog to your heart's content!</p>
					</li>";
				}
				$db->close();
			?>
          </ul>
		<ul class="pagination">
		<?php
			if ($pg_max>0&&$paging){
				$pg_max=ceil($pg_max/$NUMPERPAGES);
				$f1=false;
				$f2=false;
				$a=0;$b=0;
				$a=$pg_num-(($NUMPAGEBELOW-($NUMPAGEBELOW%2==0?2:1))/2);
				$b=$pg_num+(($NUMPAGEBELOW-($NUMPAGEBELOW%2==0?0:1))/2);
				if ($a<1){
					$a=1;$f1=true;
				}
				if ($b>$pg_max){
					$b=$pg_max;$f2=true;
				}
				if ($f1!=$f2){
					if ($f1){
						$b=$a+$NUMPAGEBELOW-1;
						if ($b>$pg_max)$b=$pg_max;
					} else {
						$a=$b-$NUMPAGEBELOW+1;
						if ($a<1)$a=1;
					}
				}
				echo "
				<li>
					<a href=\"?p=".($pg_num>1?$pg_num-1:$pg_num)."\">Prev</a>
				</li>";
				for ($i=$a;$i<=$b;$i++){
					echo "
					<li".($i==$pg_num?" class=\"active\"":"").">
						<a href=\"?p=".($i)."\">".($i)."</a>
					</li>";
				}
				echo "
				<li>
					<a href=\"?p=".($pg_num+1<=$pg_max?$pg_num+1:$pg_max)."\">Next</a>
				</li>";
			}
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
<script type="text/javascript">
	function DeletePost(){
		if (confirm('Delete this post?')) {
			return true;
		} else {
			return false;
		}
	}
</script>

</body>
</html>