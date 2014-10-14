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

<title>Simple Blog | Edit Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="#">+ Edit Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>
             <?php 
            echo "
            <div id=\"contact-area\">
                <form method=\"post\" action=\"proses.php?type=1&id=".$_GET['id']."\" onSubmit=\"return checkform()\">
            ";
                    

                     //create connection
                    $connect=mysqli_connect("localhost","root", "", "simple_blog");
                    // Check connection
                    if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }


                    $result = mysqli_query($connect,"SELECT * FROM posting WHERE ID=" .$_GET['id']. " ");
                    $row = mysqli_fetch_array($result);

                    
                    echo " <label for=\"Judul\">Judul:</label>
                    <input type=\"text\" name=\"Judul\" id=\"Judul\" value=\"". $row['Judul']. "\">

                    <label for=\"Tanggal\">Tanggal:</label>
                    <input type=\"text\" name=\"Tanggal\" id=\"Tanggal\" value=". $row['Tanggal'].">
                    
                    <label for=\"Konten\">Konten:</label><br>
                    <textarea name=\"Konten\" rows=\"20\" cols=\"20\" id=\"Konten\">". $row['Konten']. "</textarea>
                    ";



                    mysqli_close($connect);
                    ?>
                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
                 
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Web Based Development
        <br>
        <a class="twitter-link" >Facebook</a> :
        <a class="twitter-link" href="http://facebook.com/susantigojali">Susanti Gojali</a> 
        <br>
        <a class="twitter-link" >Twitter</a> :
        <a class="twitter-link" href="http://twitter.com/susantigojali">Susanti Gojali</a>
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
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




<script>
function checkform()
{

    if(document.getElementById("Judul").value!="" && document.getElementById("Tanggal").value!= "" &&
     document.getElementById("Konten").value!= "")
    {

        if(checkDateTime())
        {
            return true;
        }
        else
        {
            alert("Date is not valid");
            return false;
        }
        
    }
    else
    {
        alert("Form is not completed");
        return false;
    }
}

</script>


<script>

function checkDateTime()
{
  
    
  var date = new Date();
  var y = date.getFullYear();
  var m = date.getMonth()+1;
  var d = date.getDate();
  alert(y+" "+m+" "+d);


  var tanggal=document.getElementById("Tanggal").value;
  var array_tanggal= tanggal.split("-");
  alert(array_tanggal);
  
  if( array_tanggal[0]>y )
  {
    return true;
  }
  else if( array_tanggal[0]==y )
  {

    if(array_tanggal[1]>m )
    {
        return true;

    }
    if(array_tanggal[1]==m )
    {

        if(array_tanggal[2]>=d )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }

  }
  else
  {
    return false;
  }
}


</script>



</body>
</html>