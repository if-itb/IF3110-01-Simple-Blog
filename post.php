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
<?php
	$bulan=["JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER"];
	$db = new mysqli($db_loc,$db_user,$db_pass,$db_name);
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
<title>Simple Blog | <?php echo $title;?></title>

</head>

<body class="default" onload="LoadComment(1)">
<div class="wrapper">

<?php include 'header.php';?>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo (!$valid)?"4-0-4":"".date('j',$date)." ".$bulan[date('n',$date)-1]." ".date('Y',$date);?></time>
            <h2 class="art-title"><?php echo $title;?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <?php echo str_replace("\n","<br>",$content);?>
            <hr />
			<?php if ($valid){
			echo "<p>
			  <a href=\"edit.php?id=".$res['ID']."\">Edit</a> | <a href=\"proc.php?x=3&id=".$res['ID']."\">Hapus</a>
			</p>";}?>
            
			<?php
			if ($valid){?>
				<a name="comment"></a>
				<h2>Komentar</h2>
				
				<div id="contact-area">
					<form method="post" onsubmit="return SubmitComment(this);">
						<label for="Nama">Nama:</label>
						<input type="text" name="Nama" id="Nama">
						
						<label for="Email">Email:</label>
						<input type="text" name="Email" id="Email" onchange="validEmail()">
						<a id="alert-email"></a>
						<label for="Komentar">Komentar:</label><br>
						<textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
						
						<input type="hidden" name="ID" id="ID" value="<?php echo $tp;?>">
						
						<input type="submit" name="submit" value="Kirim" class="submit-button">
					</form>
				</div>
			<a onclick="LoadComment(1);">refresh</a>
			<?php }?>
            <ul class="art-list-body" name='comment-area' id='comment-area'>
                <li class="art-list-item">
					<div class="art-list-item-title-and-time">
						<h2 class="art-list-title"></h2>
						<div class="art-list-time">There is no comment</div>
					</div>
				</li>
            </ul>
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
	function isPgC(){
		return GetElmt('Pg_C').name=="1";
	}
	function CallComment(param){
		var x=new XMLHttpRequest || new ActiveXObject('Microsoft.XMLHTTP');
		x.open('POST','comment.php');
		x.onreadystatechange=function(){
			if((x.readyState===4)&&(x.status===200)){
				GetElmt('comment-area').innerHTML=x.responseText;
			}
		}
		param.append('pid',GetElmt('ID').value);
		x.send(param);
	}
	function SubmitComment(data){
		if ((GetElmt('Komentar').value!=='')&&(validEmail())){
			var tp=new FormData(data);
			tp.append('x',1);
			CallComment(tp);
			GetElmt('Komentar').value='';
		}
		return false;
	}
	function DeleteComment(id){
		if (confirm('Delete this comment?')) {
			var tp=new FormData();
			tp.append('x',2);
			tp.append('id',id);
			CallComment(tp);
		}
	}
	function LoadComment(pg){
		var tp=new FormData();
		if (isPgC){
			tp.append('p',pg);
			//GetElmt('Komentar').value='benar';
		}
		tp.append('x',0);
		CallComment(tp);
	}
	function validEmail(){
		var chk=/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum)\b$/;
		if (chk.test(GetElmt('Email').value.toLowerCase())){
			GetElmt('alert-email').innerHTML="";
			return true;
		} else {
			GetElmt('alert-email').innerHTML="<label></label><input type=\"text\" disabled value=\"Wrong Email\">";
			return false;
		}
	}
</script>

</body>
</html>