<?php include('header.php'); ?>
<script type="text/javascript">
	appendTitle("Tambah Post");
</script>

<article class="art simple post">
	<h2 class="art-title" style="margin-bottom:40px">-</h2>
	<div class="art-body">
		<div class="art-body-inner">
			<h2>Tambah Post</h2>
			<div id="contact-area">
				<form name="formPost" id="formPost" method="post" action="exec_post.php" onsubmit="return validateForm();">
					<label for="Judul">Judul:</label>
					<input type="text" name="Judul" id="Judul" required />

					<label for="Tanggal">Tanggal:</label>
	                <input type="text" name="Tanggal" id="Tanggal" value="<?php echo date("d/m/Y"); ?>" placeholder="DD/MM/YYYY" pattern="[0-3][0-9][/][0-1][0-9][/][0-9]+" required/>
	                    
	                <label for="Konten">Konten:</label><br />
	                <textarea name="Konten" rows="20" cols="20" id="Konten" required></textarea>

	                <input type="checkbox" name="Featured" id="Featured" style="margin-left:120px;width:20px;">Featured</input><br />

	                <input type="submit" name="submit" id="submit" value="Simpan" class="submit-button"  />
				</form>
			</div>
		</div>
	</div>
</article>

<?php include('footer.php'); ?>