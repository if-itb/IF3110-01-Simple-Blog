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

<title>Simple Blog | Edit Post</title>

</head>

<body class="default">

<?php
//create connection
$con=mysqli_connect("localhost","root","asdasd123","blog");

//check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

$id_post = $_GET['id_post'];
$result = mysqli_query($con, "SELECT * FROM post WHERE id_post = $id_post");
$row = mysqli_fetch_array($result);

?>

<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><img src="assets/img/blogicon.png"></a>
    <ul class="nav-primary">
        <li><a href="edit_post.html">+ Edit Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <header class="art-header">
        <div class="art-header-inner">
            <h2 class="art-title">Edit Post</h2>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">

            <div id="contact-area">
                <form method="post" action="update_post.php?id_post=<?php echo $row['id_post']; ?>" onsubmit="return ValidateDate(this.Tanggal)">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $row['judul']; ?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="Date" name="Tanggal" id="Tanggal" value="<?php echo $row['tanggal']; ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $row['content']; ?></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>
<script>
function ValidateDate(input){
    var validformat=/^\d{4}\-\d{2}\-\d{2}$/; //Basic check for format validity
    var returnval=false;
    if (!validformat.test(input.value)){
        alert("Tanggal tidak valid. Masukkan tanggal YYYY-MM-DD.");
    } else { //Detailed check for valid date ranges
        var dayfield=input.value.split("-")[2];
        var monthfield=input.value.split("-")[1];
        var yearfield=input.value.split("-")[0];
        var dayobj = new Date(yearfield, monthfield-1, dayfield);
        var d = new Date();
        var DateNow = new Date();
        DateNow.setFullYear(d.getFullYear(), d.getMonth(), d.getDate());
        if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)) {
            alert("Invalid Day, Month, or Year range detected. Please correct and submit again.");
        }
        else if ((dayobj > DateNow)|| (dayobj.getDate() == DateNow.getDate() && dayobj.getMonth() == DateNow.getMonth() && dayobj.getFullYear() == DateNow.getFullYear())) {
            returnval=true;
        } else {
            alert("Tanggal harus lebih besar sama dengan hari ini.");
        }
    }
    if (returnval==false) {
        input.select();
        return returnval;
    }
}
</script>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <aside class="offsite-links">
    <a href="https://twitter.com/vidianindhita"><img src="assets/img/twitter.png"></a>
    <a href="https://www.facebook.com/vanindhita"><img src="assets/img/facebook.png"></a>
    </aside>
</footer>

</div>
</body>
</html>