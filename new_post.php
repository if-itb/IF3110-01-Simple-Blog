<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="icon" type="image/png" href="Aang.png">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Tambah Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><img id="aang" src="Aang.png" /></a>
    <ul class="nav-primary">
        <div id="hed">
        <li><a>Add Post</a></li>
            
        <a href="new_post.php"><img id="addico" src="plus.png" /></a>
     </div>
    </ul>
    
</nav>

<article class="art simple post">


    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
                <form method="post" name="form1" action="ngepost.php">
               
                    <input type="text" name="Judul" id="Judul" placeholder="Judul">
                    <div id="Tgl">
                    <input type="text" name="Tanggal" id="Tanggal" onchange="return cektanggal()" placeholder="YYYY-MM-DD" maxlength="10">
                    <p id="note">Tanggal Salah!</p>
                    </div>
                    <textarea name="Konten" rows="20" cols="20" id="Konten" placeholder="konten"></textarea>
                    <input type="submit" name="submit" id="subpost" value="Simpan" onclick="return cektanggal()" class="submit-button">
                </form>
            
        
    </div>

</article>

</div>

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
