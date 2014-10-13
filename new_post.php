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

<title>Simple Blog | Tambah Post</title>

</head>

<body class="default">
<div class="wrapper">

<?php include 'header.php';?>
<?php
if(!empty($_POST)) {
	$con=mysqli_connect("localhost","root","","simple_blog");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$title = mysqli_real_escape_string($con, $_POST['Judul']);
	$content = mysqli_real_escape_string($con, $_POST['Konten']);
	$date = date('Y-m-d', strtotime($_POST['Tanggal']));
	$isSuccess = mysqli_query($con,"INSERT INTO post (title,content,date) VALUES ('$title','$content','$date')");
	mysqli_close($con);
}
?>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form name="postForm" method="post">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" required>

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" required>
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten" required></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<?php include 'footer.php';?>

</div>

<script type="text/javascript">
	var dateField = document.forms["postForm"]["Tanggal"];
	var form = document.forms["postForm"];
	function checkDateValidity()
	{
		var curDate = new Date();
		var inDate = Date.parse(dateField.value);
		if(isNaN(inDate) || inDate < curDate.getTime())
		{
			dateField.setCustomValidity('Invalid date.');
		}
		else
		{
			dateField.setCustomValidity('');
		}
	}
	dateField.addEventListener('change', checkDateValidity);
	function checkFormValidity()
	{
		checkDateValidity();
        if (!this.checkValidity()) {
            event.preventDefault();
            dateField.focus();
        }
	}
	form.addEventListener('submit', checkFormValidity, false);
</script>


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