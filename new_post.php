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

<script>
    function validateForm(){
        // pengecekan tanggal input terhadap tanggal hari ini
        var todayDate = new Date(<?php echo time(); ?>*1000);
        var date = new Date(document.forms['newpost']['date'].value);
        date.setHours(23);
        date.setMinutes(59);
        date.setSeconds(59);
        if(date >= todayDate && valiDate()){
            return true;
        }
        else{
            alert("Invalid date");
            return false;
        }
    }

    function valiDate(){
        // validasi eksistensi tanggal (misal 31 februari)
        var date_array = document.forms['newpost']['date'].value.split("-");
        var date = new Date(document.forms['newpost']['date'].value);
        if(date.getDate() == date_array[2]){
            return true;
        }
        return false;
    }
</script>

<?php 
    if(isset($_GET['post-id']))
        $isEdit = true;
    else
        $isEdit = false;
    if($isEdit)
        echo "<title>Simple Blog | Edit Post</title>";
    else
        echo "<title>Simple Blog | Tambah Post</title>";
?>


</head>

<body class="default">
<img src="assets/img/bg.png" class="background">
<img src="assets/img/navbackground.png" class="navbackground">
<div class="wrapper">

<nav class="nav">
    
    <div class="logologo">
      <img src="assets/img/navicon.png" class="navicon">
      <a id="logo" href="index.php"><img src="assets/img/icontext.png" class="icontext"></a>
    </div>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<?php 
    if($isEdit){
        $con = mysqli_connect("localhost", "root", "", "wbd");

        if(mysqli_connect_errno()){
            echo "Failed to connect database";
        }

        $query = "SELECT * FROM post WHERE id = " . $_GET['post-id'];
        $result = mysqli_query($con, $query) or die(mysql_error());
        $row = mysqli_fetch_assoc($result);
    }
?>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <?php 
                if($isEdit)
                    echo "<h2>Edit Post</h2>";
                else
                    echo "<h2>Tambah Post</h2>";
            ?>
            

            <div id="contact-area">
                <form method="post" name="newpost" onsubmit="return validateForm()" action=
                    <?php 
                        if($isEdit)
                            echo "'update.php'";
                        else
                            echo "'insert.php'";
                    ?>>
                    
                    <label for="Judul">Judul:</label>
                    <input type="text" name="title" id="Judul"
                        <?php 
                            if($isEdit)
                                echo "value='".$row['title']."'";
                        ?>>

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="date" placeholder="YYYY-MM-DD" id="Tanggal"
                        <?php 
                            if($isEdit)
                                echo "value='".$row['date']."'";
                        ?>>

                    <label for="Konten">Konten:</label><br>
                    <textarea name="content" rows="20" cols="20" id="Konten"><?php 
                        if($isEdit)
                            echo $row['content']; ?></textarea>

                    <?php 
                        if($isEdit){
                            echo "<input type='hidden' name='post-id' value=".$_GET['post-id'].">";
                        }
                    ?>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Gilang Julian S. / 13512045
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>