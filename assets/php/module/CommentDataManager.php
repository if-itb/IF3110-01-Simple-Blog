<?php
class CommentDataManager {
	
	protected $cmnt_path;
	protected $post_id;
	
	public function __construct($cmnt_path, $post_id) {
		$this->cmnt_path = $cmnt_path;
		$this->post_id = $post_id;
	}
	
	public function get_comment($cmnt_number) {
		$path = $this->cmnt_path."/".$this->post_id.".comment";
		if(!file_exists($path)) {
			//make a folder for a comment
			//file_put_contents($file, "");
			mkdir($path);
			
			//make a counter for comment
			file_put_contents($path."/cmnt_count", "0");
		}
		
		if(file_exists($path."/".$cmnt_number)) {
			$json_text = file_get_contents($path."/".$cmnt_number);
			return json_decode($json_text, true);
		} else {
			return "";
		}
	}
	
	public function put_comment($data, $cmnt_number) {
		$file = $this->cmnt_path."/".$this->post_id.".comment/".$cmnt_number;
		$json_text = json_encode($data);
		return file_put_contents($file, $json_text);
	}
	
	public function add_comment($sender, $email, $date, $comment) {
		//$data = $this->get_comment();
		$cmnt_number = $this->increment_comment_count();
		/*if($data === false) {
			$data = array();
		}*/
		$item = array(
			"sender" => $sender,
			"email" => $email,
			"date" => $date,
			"comment" => $comment
		);
		return $this->put_comment($item, $cmnt_number);
	}
	
	public function delete_all_comment() {
		$path = $this->cmnt_path."/".$this->post_id.".comment/";
		$this->delete_recursive($path);
	}
	
	private function delete_recursive($directory) {
		foreach(glob("{$directory}/*") as $file) {
			if(is_dir($file)) {
				delete_recursive($file);
			} else {
				unlink($file);
			}
		}
		rmdir($directory);
	}
	
	private function increment_comment_count() {
		$path = $this->cmnt_path."/".$this->post_id.".comment";
		$count = file_get_contents($path."/cmnt_count");
		$count += 1;
		file_put_contents($path."/cmnt_count", $count);
		return $count;
	}
}
?>