<?php
class PostDataManager {

	const ID_LENGTH = 10;
	const INDEX_FILENAME = "/index.json";
	
	protected $post_path;
	protected $index_path;
	
	public function __construct($post_path, $index_path) {
		
		$this->post_path = $post_path;
		$this->index_path = $index_path;
		
	}
	
	/*POSTING PART*/
	public function get_post($post_title, $post_date) {
		$id = $this->get_id($post_title, $post_date);
		$post = array();
		
		if($id != "") {
			$json_text = file_get_contents($this->post_path."/".$id);
			$post = json_decode($json_text, true);
		}
		
		return $post;
	}
	
	public function make_post($post_title, $date, $post_content) {
		$char = "abcdefghijklmnopqrstuvwxyz0123456789";
		$id = "";
		
		//make an id
		for($i = 0; $i < self::ID_LENGTH; $i++) {
			$id .= $char[rand(0, strlen($char) - 1)];
		}
		
		$data = array(
			"date" => $date,
			"title" => $post_title,
			"content" => "<p>".$post_content
		);
		
		$json_text = json_encode($data);
		
		$retval = file_put_contents($this->post_path."/".$id,$json_text);
		
		if($retval !== false) {
			
			//update index
			$this->add_to_index($id, $post_title, $date, $post_content);
			
			return $id;
			
		} else {
			return $retval;
		}
	}
	
	public function edit_post($old_post_title, $old_date, $new_post_title, $new_date, $content) {
		
		$id = $this->get_id($old_post_title, $old_date);
		
		$data = file_get_contents($this->post_path."/".$id);
		$arr = json_decode($data, true);
		
		$arr["date"] = $new_date;
		$arr["title"] = $new_post_title;
		$arr["content"] = "<p>".$content;
		
		$json_text = json_encode($arr);
		
		$retval = file_put_contents($this->post_path."/".$id, $json_text);
		
		if($retval !== false) {
			//update index
			$this->replace_entry($id, $old_post_title, $old_date, $new_post_title, $new_date, $content);
		
		}
		
		return $retval;
	}

	public function delete_post($post_title, $date) {
		$id = $this->get_id($post_title, $date);
		unlink($this->post_path."/".$id);
		
		//update index
		$retval = $this->remove_from_index($id, $date);
		return $retval;
	}
	
	/*INDEXING PART*/
	public function get_index() {
		$json_text = file_get_contents($this->index_path.self::INDEX_FILENAME);
		return json_decode($json_text, true);
	}
	
	//save index to index file
	private function put_index($data) {
		$json_text = json_encode($data);	
		return file_put_contents($this->index_path.self::INDEX_FILENAME, $json_text);
	}
	
	
	private function add_to_index($id, $post_title, $post_date, $content) {
		
		//generate some pseudorandom filename
		$content_digest = substr($content, 0, 100);
		if(strlen($content) > 100) {
			$content_digest .= "...";
		}
		
		$index = $this->get_index();
		
		//if no date key exist, create new entry
		if(!array_key_exists($post_date, $index)) {
			$index[$post_date] = array();
		}
		
		//check if item already exist (by title)
		foreach($index[$post_date] as $key => $value) {
			if(strcmp($value["title"], $post_title) === 0) {
				return false;
			}
		}
		
		//construct new item for index
		$new_item = array(
			"title" => $post_title,
			"prev" => $content_digest
		);
		
		//add item if no such item exist
		$index[$post_date][$id] = $new_item;
		
		//update index
		$retval = $this->put_index($index);
		
		return $retval;
	}
	
	private function remove_from_index($id, $date) {
		$index = $this->get_index();
		
		if(isset($index[$date][$id])) {
			unset($index[$date][$id]);
			if(empty($index[$date])) {
				unset($index[$date]);
			}
			$this->put_index($index);
			return true;
		}
		
		return false;
	}
	
	private function replace_entry($id, $old_post_title, $old_date, $new_post_title, $new_date, $content) {
		
		//create some content digest for previewing purpose
		$content_digest = substr($content, 0, 100);
		
		if(strlen($content) > 100) {
			$content_digest .= "...";
		}
		
		$index = $this->get_index();
		
		//check for date
		if(strcmp($old_date, $new_date) === 0) {
			
			//check for title
			if(strcmp($old_post_title, $new_post_title) !== 0) {
				$index[$old_date][$id]["title"] = $new_post_title;
			}
			
			$index[$old_date][$id]["prev"] = $content_digest;
			
		} else {
			
			unset($index[$old_date][$id]);
			if(empty($index[$old_date])) {
				unset($index[$old_date]);
			}
			
			if(!array_key_exists($new_date, $index)) {
				$index[$new_date] = array();
			}
			
			$item = array(
				"title" => $new_post_title,
				"prev" => $content_digest
			);
			
			$index[$new_date][$id] = $item;
			
		}

		$this->put_index($index);
		
	}
	
	public function get_id($post_title, $post_date) {
		$index = $this->get_index();
		$arr = $index[$post_date];
		
		foreach($arr as $key => $value) {
			if(strcmp($value["title"], $post_title) === 0) {
				return $key;
			}
		}
		
		return "";
	}
}

?>