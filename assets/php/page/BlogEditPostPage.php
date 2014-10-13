<?php
include_once("assets/php/page/BlogNewPostPage.php");
include_once("assets/php/module/PostDataManager.php");

class BlogEditPostPage extends BlogNewPostPage {

	protected $post_title;
	protected $post_date;
	
	public function __construct($post_title, $post_date) {
			
		parent::__construct();
		
		$this->post_title = $post_title;
		$this->post_date = $post_date;
		
	}
	
	public function get_content() {
		
		$data_mgr = new PostDataManager(parent::path_data, parent::path_data);
		$post = $data_mgr->get_post($this->post_title, $this->post_date);
		$content = str_replace("<p>", "\r\n", $post["content"]);
		$old_title = urlencode($this->post_title);
		$old_date = urlencode($this->post_date);
	
		return <<<EOD
<article class="art simple post">	
	<h2 class="art-title" style="margin-bottom:40px">-</h2>	
		<div class="art-body">
			<div class="art-body-inner">
			<h2>Edit Post</h2>
		
				<div id="contact-area">
				<form name="post-input" onsubmit="return validateDate();" method="post" action="handler.php?edit=true&title=$old_title&date=$old_date">
				<label for="Judul">Judul:</label>
				<input type="text" name="Judul" id="Judul" value="{$post["title"]}">
		
				<label for="Tanggal">Tanggal:</label>
				<input type="text" name="Tanggal" id="Tanggal" placeholder="yyyy/mm/dd" value={$post["date"]}>
		
				<label for="Konten">Konten:</label><br>
				<textarea name="Konten" rows="20" cols="20" id="Konten">$content</textarea>
				<input type="hidden" name="olddate" value="{$post["date"]}" />
				<input type="hidden" name="oldtitle" value="{$post["title"]}" />
		
				<input type="submit" name="submit" value="Simpan" class="submit-button">
				</form>
			</div>
		</div>
	</div>
		
</article>
EOD;
	
	}
}

?>