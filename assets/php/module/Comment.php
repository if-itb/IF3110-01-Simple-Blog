<?php
include_once("assets/php/base/Module.php");

class Comment extends Module {
	
	protected $cmnt_path; //comment file path
	protected $post_id;
	
	public function __construct($page, $path, $post_id) {
		parent::__construct($page);
		$this->cmnt_path = $path;
		$this->post_id = $post_id;
	}
	
	public function get_content() {
		$text_area = $this->get_text_area();
		//$comment_list = $this->get_comment_list();
		$comment = "";
		
		return <<<EOD
<h2>Komentar</h2>
$text_area
<ul class="art-list-body" id="comment-list" onload="loadComment();">
</ul>
EOD;
	}
	
	public function get_text_area() {
		return <<<EOD
<div id="contact-area">
	<form name="comment-form">
		<label for="Nama">Nama:</label>
		<input type="text" name="Nama" id="Nama">
        
		<label for="Email">Email:</label>
		<input type="text" name="Email" id="Email">
		
		<label for="Komentar">Komentar:</label><br>
		<textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
		
		<input type="button" name="submit" value="Kirim" class="submit-button" onclick="if(validateEmail()){sendComment();}">
	</form>
</div>
EOD;
	}
	
	public function get_js_linked() {
		return array(
			"comment_module.js"
		);
	}
		
}
?>