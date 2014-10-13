<?php
require_once("assets/php/base/Page.php");

//sitewide page
class SimpleBlog extends Page {
	
	const path_css = "assets/css";
	const path_js = "assets/js";
	const path_img = "assets/img";
	const path_data = "assets/data";
	
	protected $hdr_link_ref; //header link referrer
	protected $new_post_ref; //new post link referrer
	protected $ftr_link_ref; //footer link referrer
	
	public function __construct() {
		parent::__construct();
		
		$this->hdr_link_ref = "index.php";
		$this->new_post_ref = "new_post.php";
		$this->ftr_link_ref = "index.php";
	}
	
	public function get_css_common() {
		return array(
			"screen.css"
		);
	}
	
	public function get_js_common() {
		return array(
			"jquery.min.js",
			"fittext.js",
			"app.js",
			"respond.min.js",
		);
	}
	
	public function get_header() {
		return <<<EOD
<nav class="nav">
	<a style="border:none;" id="logo" href="{$this->hdr_link_ref}"><h1>Simple<span>-</span>Blog</h1></a>
	<ul class="nav-primary">
        <li><a href="{$this->new_post_ref}">+ Tambah Post</a></li>
	</ul>
</nav>
EOD;
	}
	
	public function get_footer() {
		return <<<EOD
<footer class="footer">
	<div class="back-to-top"><a href="">Back to top</a></div>
	<div class="psi">&Psi;</div>
	<aside class="offsite-links">
		Mufi Yanuar Triputranto / 13510106
	</aside>
</footer>
EOD;
	}
	
	public function set_title() {
		$this->title = "Simple Blog";
	}
	
	public function set_meta() {
	}
	
	public function set_css_class() {
		$this->css_class = "default";
	}
	
	public function register_links() {
		$this->css_linked_info = array(
			"screen.css" => array(
				"loc_path" => self::path_css."/screen.css",
				"media" => "all"
			)
		);
		
		$this->js_linked_info = array(
			"jquery.min.js" => array(
				"loc_path" => self::path_js."/jquery.min.js"
			),
			"fittext.js" => array(
				"loc_path" => self::path_js."/fittext.js"
			),
			"app.js" => array(
				"loc_path" => self::path_js."/app.js"
			),
			"respond.min.js" => array(
				"loc_path" => self::path_js."/respond.min.js"
			),
			"myscript.js" => array(
				"loc_path" => self::path_js."/myscript.js"
			),
			"comment_module.js" => array(
				"loc_path" => self::path_js."/comment_module.js"
			)
		);
		
	}
}

?>