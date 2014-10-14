<?php
	function ConnecttoDatabase(){
		$dbhandle = mysqli_connect("akhfa.in", "lomba", "lombabertiga", "lomba_simpleblog");
		return $dbhandle;
	}
	
	function CloseDatabaseConnection($dbhandle){
		mysqli_close($dbhandle);	
	}
	
	function FetchPostList(){
		$dbhandle = ConnecttoDatabase();
		$PostList = array();
		
		$sqlquery = "SELECT * FROM Posts";
		$result = mysqli_query($dbhandle, $sqlquery);
		while($row = mysqli_fetch_array($result))
		{
			$PostList[] = new Post($row['PostID'], $row['Judul'], $row['Tanggal'], $row['Konten']);
		}
		CloseDatabaseConnection($dbhandle);
		return $PostList;
	}
	
	function PrintPostList($PostList){
		$NumberofPost = count($PostList);
		echo "<div class=\"posts\">
				<nav class=\"art-list\">
				  <ul class=\"art-list-body\">";
		for($i = 0; $i < $NumberofPost; $i++){
			$ID = $PostList[$i]->GetID();
			$Title = $PostList[$i]->GetTitle();
			$Date = $PostList[$i]->GetDate();
			$Content = substr($PostList[$i]->GetContent(), 0, 300);
			echo "<li class=\"art-list-item\">
				<div class=\"art-list-item-title-and-time\">
					<h2 class=\"art-list-title\"><a href=\"post.php?ID=$ID&Title=$Title\">$Title</a></h2>
					<div class=\"art-list-time\">$Date</div>
					<div class=\"art-list-time\"><span style=\"color:#F40034;\">&#10029;</span> Featured</div>
				</div>
				<p>
					$Content ...
				</p>
				<p>
				  <a href=\"new_post.php?ID=$ID\">Edit</a> | <a href=\"delete_post.php?ID=$ID\" onclick=\"return confirm('Apakah Anda yakin menghapus post ini?')\">Hapus</a>
				</p>
				<p id=\"demo\"></p>
			</li>";
		}
		echo "		</ul>
			</nav>
		</div>";
	}
	
	function GetPostTitle(){
		if(isset($_POST['Judul'])){
			$Title = $_POST['Judul'];
		}	
		return $Title;
	}
	
	function GetPostDate(){
		if(isset($_POST['Tanggal'])){
			$Date = $_POST['Tanggal'];
		}	
		return $Date;
	}
	
	function GetPostContent(){
		if(isset($_POST['Konten'])){
			$Content = $_POST['Konten'];
		}	
		return $Content;
	}
	
	function AddPosttoDatabase(){
		$dbhandle = ConnecttoDatabase();
		$Title = GetPostTitle();
		$Date = GetPostDate();
		$Content = GetPostContent();
		$sqlquery = "INSERT INTO Posts (Judul, Tanggal, Konten) VALUES ('$Title', '$Date', '$Content')";
		mysqli_query($dbhandle, $sqlquery);
		CloseDatabaseConnection($dbhandle);
	}
	
	function FetchPostFromDatabase($ID){
		$dbhandle = ConnecttoDatabase();
		$sqlquery = "SELECT * FROM Posts WHERE PostID='$ID'";
		$result = mysqli_query($dbhandle, $sqlquery);
		while($row = mysqli_fetch_array($result))
		{
			$Post= new Post($row['PostID'], $row['Judul'], $row['Tanggal'], $row['Konten']);
		}
		CloseDatabaseConnection($dbhandle);
		return $Post;
	}
	
	function UpdatePost($ID){
		$dbhandle = ConnecttoDatabase();
		$Title = GetPostTitle();
		$Date = GetPostDate();
		$Content = GetPostContent();
		$sqlquery = "UPDATE Posts SET Judul='$Title', Tanggal='$Date', Konten='$Content' WHERE PostID='$ID'";
		mysqli_query($dbhandle, $sqlquery);
		CloseDatabaseConnection($dbhandle);
	}
	
	function DeletePost($ID){
		$dbhandle = ConnecttoDatabase();
		$sqlquery = "DELETE FROM Posts WHERE PostID='$ID'";
		mysqli_query($dbhandle, $sqlquery);
		CloseDatabaseConnection($dbhandle);
	}
		
	class Post{
		private $ID;
		private $Title;
		private $Date;
		private $Content;
		
		public function __construct($ID, $Title, $Date, $Content){
			$this->ID = $ID;
			$this->Title = $Title;
			$this->Date = $Date;
			$this->Content = $Content;
		}
		
		public function GetID(){
			return $this->ID;	
		}
		
		public function GetTitle(){
			return $this->Title;	
		}
		
		public function GetDate(){
			return $this->Date;	
		}
		
		public function GetContent(){
			return $this->Content;	
		}
	}
?>
