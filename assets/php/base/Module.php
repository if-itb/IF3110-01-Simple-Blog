<?php
class Module {
	
	//module refference for a page where it's reside
	protected $page;
	
	public function __construct($page) {
		$this->page = $page;
	}
	
	public function create() {
		//add css
		$this->page->add_to_css_linked($this->get_css_linked());
		$this->page->add_to_css($this->get_css());
		
		//add js
		$this->page->add_to_js_linked($this->get_js_linked());
		$this->page->add_to_js($this->get_js());
		
		return $this->get_content();
	}
	
	public function get_css_linked() {
	}
	
	public function get_css() {
	}
	
	public function get_js_linked() {
	}
	
	public function get_js() {
	}
	
	public function get_content() {
	}

}

?>