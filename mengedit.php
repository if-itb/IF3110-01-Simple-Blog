<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="icon" type="image/png" href="Aang.png">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Just Blog | Edit Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><img id="aang" src="Aang.png" /></a>
    <ul class="nav-primary">
        <div id="hed">
        <li><a>Edit Post</a></li>
            
        <a href="new_post.php"><img id="addico" src="plus.png" /></a>
     </div>
    </ul>
    
</nav>

<article class="art simple post">


    <h2 class="art-title" style="margin-bottom:40px">-</h2>
	<?php
	$con=mysqli_connect("localhost","root","","datapost");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .mysql_conneect_error();
	}
	$ids = $_GET['id'];
	$result = mysqli_query($con,"SELECT * FROM postingan WHERE IDpost = $ids");
	while($row = mysqli_fetch_array($result)) {
	$Judul = $row['Judul'];
	$Tanggal = $row['Tanggal'];
	$Konten = $row['Konten'];
	}
	?>
    <div class="art-body">
        <div class="art-body-inner">
            <div id="contact-area">
                <form method="post" name="form1" action="edit_post.php?id=<?php echo $ids; ?>" >
     
                    <input type="text" name="Judul" id="Judul" value="<?php echo $Judul?>">
                    
                    <div id="Tgl">
             
                    <input type="text" value="<?php echo $Tanggal?>" name="Tanggal" id="Tanggal" placeholder="YYYY-MM-DD" maxlength="10" onchange="return cektanggal()">
                    <p id="note">Tanggal Salah!</p>
                    </div>
                        

                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $Konten?></textarea>

                    <input type="submit" name="submit" onclick="return cektanggal()" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

</div>
<?php mysqli_close($con);?>
<script type="text/javascript">

function cektanggal()
{
	var tanggal = document.forms["form1"]["Tanggal"].value;
	var n = tanggal.search("[0-9]{4}-[0-9]{2}-[0-9]{2}");
	if (n == 0){
		var Dat = new Date(tanggal);
		var Now = new Date();
		if (Dat>Now){
			document.getElementById("Tanggal").style.background = "lime";
            document.getElementById("Tanggal").style.color = "white";
            document.getElementById("note").style.visibility = "hidden";
            document.getElementById("note").style.height = 0;
		}
		else if(Dat.getDate()==Now.getDate()&&Dat.getMonth()==Now.getMonth()&&Dat.getFullYear()==Now.getFullYear()){
			document.getElementById("Tanggal").style.background = "lime";
            document.getElementById("Tanggal").style.color = "white";
            document.getElementById("note").style.visibility = "hidden";
            document.getElementById("note").style.height = 0;
		}
		else{
			document.getElementById("Tanggal").style.background = "red";
            document.getElementById("Tanggal").style.color = "white";
            document.getElementById("Tanggal").focus();
            document.getElementById("note").style.visibility = "visible";
            document.getElementById("note").style.height = 31;
            return false;
		}
	}
	else{
		document.getElementById("Tanggal").style.background = "red";
        document.getElementById("Tanggal").style.color = "white";
		document.getElementById("Tanggal").focus();
        document.getElementById("note").style.visibility = "visible";
        document.getElementById("note").style.height = 31;
        return false;
        
	}
}
</script>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>
