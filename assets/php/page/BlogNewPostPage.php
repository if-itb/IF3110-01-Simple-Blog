<?php
include_once("assets/php/page/SimpleBlog.php");
include_once("assets/php/module/PostDataManager.php");

class BlogNewPostPage extends SimpleBlog {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_content() {
			
		return <<<EOD
<article class="art simple post">	
	<h2 class="art-title" style="margin-bottom:40px">-</h2>	
	<div class="art-body">
		<div class="art-body-inner">
			<h2>Tambah Post</h2>
		
			<div id="contact-area">
				<form name="post-input" onsubmit="return validateDate();" method="post" action="handler.php">
					<label for="Judul">Judul:</label>
					<input type="text" name="Judul" id="Judul">
		
					<label for="Tanggal">Tanggal:</label>
					<input type="text" name="Tanggal" id="Tanggal" placeholder="yyyy/mm/dd">
		
					<label for="Konten">Konten:</label><br>
					<textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>
		
					<input type="submit" name="submit" value="Simpan" class="submit-button">
				</form>
			</div>
		</div>
	</div>
		
</article>
EOD;
	}
	
	public function get_js_linked() {
		return array(
			"myscript.js"
		);
	}
}

?>