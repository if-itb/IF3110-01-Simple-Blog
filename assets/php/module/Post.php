<?php
include_once("assets/php/base/Module.php");
include_once("assets/php/module/PostDataManager.php");
include_once("assets/php/module/Comment.php");

class Post extends Module {
	
	//assumption : there's no post with same title
	const INDEX_FILENAME = "/index.json";
	
	//protected $post_list
	protected $post_index;	//index file for post
	protected $post_path;   //path to the post filesize
	protected $index_path;  //path to the index file
	protected $post_title;	//name for post
	protected $post_date;   //date for a post
	
	protected $is_preview;  //mode for module (preview vs full)

	public function __construct(
		$page, 
		$index_path, 
		$post_path, 
		$is_preview, 
		$post_title,
		$post_date
	) {
		parent::__construct($page);
		
		$this->post_index = array();
		$this->post_path = $post_path;
		$this->index_path = $index_path;
		$this->is_preview = $is_preview;
		$this->post_title = $post_title;
		$this->post_date = $post_date;
		
		$args = array(
			"path" => $index_path,
			"fname" => self::INDEX_FILENAME
		);
		$retval = "";
		
		$json_text = file_get_contents($this->index_path.self::INDEX_FILENAME);
		$this->post_index = json_decode($json_text, true);
		
	}
	
	public function get_content() {
		
		if(count($this->post_index)==0) {
			return "";
		}
		
		if($this->is_preview) {
			$list = $this->get_list();
			$post_list = "";
			foreach($list as $date => $id) {
				foreach($id as $key => $value) {
				$title_param = urlencode($value["title"]);
				$date_param = urlencode($date);
				$post_list .= <<<EOD
<li class="art-list-item">
    <div class="art-list-item-title-and-time">
		<h2 class="art-list-title"><a href="post.php?title=$title_param&date=$date_param" id="title">{$value["title"]}</a></h2>
		<div class="art-list-time">$date</div>
    </div>
	{$value["prev"]}
    <p>
		<a href="edit_post.php?title=$title_param&date=$date_param">Edit</a> | <a href="delete_post.php?title=$title_param&date=$date_param" onclick="return confirmDelete();">Hapus</a>
    </p>
</li>
EOD;
				}
			}
			
			return <<<EOD
<nav class="art-list">
	<ul class="art-list-body">
		$post_list
	</ul>
</nav>
EOD;
		} else {
			$post = $this->get_post();
			$id = $this->get_post_id();
			$header = $this->get_header($post["date"], $post["title"]);
			$comment_module = new Comment($this->page,
										  $this->post_path,
										  $id);
			$comment = $comment_module->create();
			
			return <<<EOD
<article class="art simple post">
$header
	<div class="art-body">
		<div class="art-body-inner">
			{$post["content"]}
			<hr />
			$comment
		</div>
	</div>
</article>			
EOD;

		}
	}
	
	protected function get_header($time, $title) {
		return <<<EOD
<header class="art-header">
	<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
		<time class="art-time" id="date">$time</time>
		<h2 class="art-title" id="title">$title</h2>
		<p class="art-subtitle"></p>
	</div>
</header>
EOD;
	}
	
	//get list of post from file
	public function get_list() {
		$data_mgr = new PostDataManager($this->post_path, $this->index_path);
		return $data_mgr->get_index();;
	}
	
	//get a post from file
	public function get_post() {
		$data_mgr = new PostDataManager($this->post_path, $this->index_path);
		return $data_mgr->get_post($this->post_title, $this->post_date);
	}
	
	public function get_post_id() {
		$data_mgr = new PostDataManager($this->post_path, $this->index_path);
		return $data_mgr->get_id($this->post_title, $this->post_date);
	}
	
	public function get_js_linked() {
		return array(
			"myscript.js"
		);
	}
}

?>