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

<?php
	$bulan=["JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER"];
	$db = new mysqli("localhost","root","","ai_tugas1");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$tp=0;
	if (!isset($_GET['id']))$tp=-1;
	else $tp=$_GET['id'];
	if ($tp>=0){
		$result = $db->query("SELECT * FROM post WHERE ID=".$tp.";");
		if(mysqli_num_rows($result)>0){
			$res=$result->fetch_array(MYSQLI_ASSOC);
			$title=$res['Title'];
			$date=strtotime($res['Date']);
			$content=$res['Content'];
			$valid=true;
		} else {
			//post not found
			$title="404 POST NOT FOUND";
			$date=strtotime(time());
			$content="
			The Post you're looking for is <b>NOT</b> found in our database.<br>
			<br>
			<br>
			Do you perhaps follow an expired link?<br>
			Maybe you input the wrong post id?<br>
			Either way, this is not the page you are looking for.<br>
			<a href=\"index.php\">Click here to go back to homepage.</a>";
			$valid=false;
		}
	} else {
		//post not found
		$title="404 POST NOT FOUND";
		$date=strtotime(time());
		$content="
		The Post you're looking for is <b>NOT</b> found in our database.<br>
		<br>
		<br>
		Do you perhaps follow an expired link?<br>
		Maybe you input the wrong post id?<br>
		Either way, this is not the page you are looking for.<br>
		<a href=\"index.php\">Click here to go back to homepage.</a>";
		$valid=false;
	}
	$db->close();
?>

<title>Simple Blog | Edit Post</title>

</head>

<body class="default">
<div class="wrapper">

<?php include 'header.php';?>

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>
			<?php
			if ($valid){?>
            <div id="contact-area">
                <form method="post" action="proc.php?x=2" onsubmit="return submitCheck();">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $title?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="<?php echo date('Y-m-d',$date)?>" onchange="validTgl()">
                    <a id="alert-date"></a>
					
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"> <?php echo $content;?></textarea>
					
					<input type="hidden" name="ID" id="Konten" value=<?php echo $tp;?>	>
                    
					<input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
			<?php } else echo $content;?>
        </div>
    </div>
</article>

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
	function GetElmt(id){
		return document.getElementById(id);
	}
	function validTgl(){
		var x=new XMLHttpRequest || new ActiveXObject('Microsoft.XMLHTTP');
		x.open('POST','proc.php?x=4');
		var param=new FormData();
		param.append('Tanggal',GetElmt('Tanggal').value);
		x.onreadystatechange=function(){
			if((x.readyState===4)&&(x.status===200)){
				GetElmt('alert-date').innerHTML=x.responseText;
			}
		}
		x.send(param);
	}
	function submitCheck(){
		if (GetElmt('alert-date').innerHTML==""){
			return true;
		} else {
			return false;
		}
	}
</script>

</body>
</html>