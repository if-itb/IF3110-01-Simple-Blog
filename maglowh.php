<!DOCTYPE html>
<html>
<head>
<title>Test</title>

<script>
	function valiDate(dateString) {
	var d = new Date();
	var dayComp = d.getDate();
	var monthComp = d.getMonth()+1;
	var yearComp = d.getFullYear();
	var dateSegment = "";
	var str = dateString;
	var i = str.length - 1;
	var segment = 2;
	var bool = true;
	//
	while (i >= -1 && bool) {
		if (str[i] == '-' || i == -1) { //year validation
			if (segment == 2) {
				alert(dateSegment+"vs"+yearComp);
				if (dateSegment < yearComp) {
					bool = false;
				}
				else {
					dateSegment = "";
					segment--;
				}
			}
			else if (segment == 1) { //month validation
				alert(dateSegment+"vs"+monthComp);
				if (dateSegment < monthComp) {
					bool = false;
				}
				else {
					dateSegment = "";
					segment--;
				}
			}
			else if (segment == 0) { //day validation
				alert(dateSegment+"vs"+dayComp);
				if (dateSegment < dayComp) {
					bool = false;
				}
			}
		}
		else {
			dateSegment = str[i] + dateSegment;
		}
		i--;
	}
	if (!bool) {
		alert("Tanggal tidak valid!");
	}
	return bool;
}
</script>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post" >
    <?php
		$x = "13-10-2014"; 
		echo $x; ?>
	<script> 
	var xd = "<?php echo $x;?>";
	alert(xd);
	if (valiDate(xd)) {
		alert("bener");
	} 
	else {
		alert("salah");
	}</script>
</body>
</html>