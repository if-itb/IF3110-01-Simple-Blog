<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/foundation.css" />
	<script type="text/javascript">
	<!--
		function ValidateCreate() {
			var today1 = new Date().getDate(),
			today2 = new Date().getMonth(),
			today3 = new Date().getFullYear(),
			date1 = new Date(document.CreatePost.Tanggal.value).getDate(),
			date2 = new Date(document.CreatePost.Tanggal.value).getMonth(),
			date3 = new Date(document.CreatePost.Tanggal.value).getFullYear(),
			D = document.forms["CreatePost"]["Tanggal"].value,
			J = document.forms["CreatePost"]["Judul"].value,
			K = document.forms["CreatePost"]["Konten"].value;
			if (J == null || J == "") {
				alert("Judul tidak boleh kosong");
				return false;
			}
			if (D == null || D == "") {
				alert("Tanggal tidak boleh kosong");
				return false;
			}
			if (K == null || K == "") {
				alert("Konten tidak boleh kosong");
				return false;
			}
			if (today3 > date3) {
				alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
				return false;
			} else if ((today3 == date3) && (today2 > date2)) {
				alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
				return false;
			} else if ((today2 == date2) && (today1 > date1)) {
				alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
				return false;
			}
		}
	-->
	</script>
</head>
 
<body>
	<div class="row">
		<div class="large-12 columns">
		<h3> Buat Post Baru </h3>
		<hr>
		<br>
		</div>
	</div>
	<form name="CreatePost" action="tambahpost.php" onsubmit="return ValidateCreate()" method=post>
		<div class="row">
			<div class="large-12 columns">
			<label>Judul</label>
			<input type="text" name="Judul" />
			<br>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Tanggal</label>
				<input type="date" name="Tanggal" placeholder="Masukkan konten post anda"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Konten</label>
				<textarea name="Konten" rows="30" placeholder="Masukkan konten post anda"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="submit" class="small button">
			</div>
		</div>
	</form>
</body>
</html>