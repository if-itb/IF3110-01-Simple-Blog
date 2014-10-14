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
        <li><a href="edit_post.php?id=<?php echo $row['id_post']; ?>">Edit Post</a></li>
    </ul>
</nav>

<?php
// Create connection
$con=mysqli_connect("Localhost", "root","windy","blogwindy");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id_post = $_GET["id"];
$result = mysqli_query($con,"SELECT * FROM post WHERE id_post=$id_post");
$row = mysqli_fetch_array($result);
?>

<article class="art simple post">
    
    
    <header class="art-header">
        <div class="art-header-inner">
            <h2 class="art-title">EDIT Post</h2>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">

            <div id="contact-area">
                <form method="post" action="update_post.php?id=<?php echo $row['id_post']; ?>" onsubmit="return validasi(this.Tanggal);">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $row['Judul']; ?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" name="Tanggal" id="Tanggal" value="<?php echo $row['Tanggal']; ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $row['Konten'];?></textarea>

                    
                    <input type="submit" name="submit" value="Edit" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<script>
function validasi(input)
{
    var validformat=/^\d{4}\-\d{2}\-\d{2}$/; //Basic check for format validity
    var returnval=false;
    if (!validformat.test(input.value)) {
        alert("Format Tanggal tidak valid.");
    } else { //Detailed check for valid date ranges
        var dayfield=input.value.split("-")[2];
        var monthfield=input.value.split("-")[1];
        var yearfield=input.value.split("-")[0];
        var dayobj = new Date(yearfield, monthfield-1, dayfield);

        var firstValue = input.value.split('-');
        var d = new Date();

        //var firstDate=new Date();
        //firstDate.setFullYear(firstValue[0],(firstValue[1] - 1 ),firstValue[2]);

        var DateNow=new Date();
        DateNow.setFullYear(d.getFullYear(), d.getMonth(), d.getDate()); 

        if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)) {
            alert("Rentang Tanggal tidak valid.");
        } else if ((dayobj > DateNow) || (dayobj.getDate() == DateNow.getDate() && dayobj.getMonth() == DateNow.getMonth() && dayobj.getFullYear() == DateNow.getFullYear()))
        {
            returnval=true;
        } else {
             alert("Tanggal harus lebih besar sama dengan hari ini");
        }
    }
    if (returnval==false) {
        input.select()
        return returnval;
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

<script type="text/javascript" src="allfunction.js"></script>

</body>
</html>