<?php
include_once("assets/php/page/SimpleBlog.php");
include_once("assets/php/module/Post.php");

class BlogMainPage extends SimpleBlog {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_content() {
		$post = new Post($this, parent::path_data, parent::path_data, true, "", "");
		$body = $post->create();
		return $post->get_content();
	}
	
}

?>