<?php
include_once("assets/php/page/SimpleBlog.php");
include_once("assets/php/module/Post.php");
include_once("assets/php/module/Comment.php");

class BlogViewPostPage extends SimpleBlog {
	
	protected $post_title;
	protected $post_date;
	
	public function __construct($post_title, $post_date) {
		parent::__construct();
		
		$this->post_date = $post_date;
		$this->post_title = $post_title;
	}
	
	public function get_content() {
		$post = new Post(
			$this, 
			parent::path_data, 
			parent::path_data, 
			false,
			$this->post_title,
			$this->post_date
		);
		
		$body = $post->create();
		return $post->get_content();
	}
}
?>