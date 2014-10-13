<?php 
	function getpost($con)
	{
		$result = mysqli_query($con,"SELECT * FROM post");
		return $result;
	}
	function getspecificpost($con,$postid)
	{
		$result = mysqli_query($con,"SELECT * FROM post WHERE Post_Id = ".$postid);
		return $result;		
	}
	function getspecificcomments($con,$postid)
	{
		$result = mysqli_query($con,"SELECT * FROM comments WHERE Post_Id = ".$postid);
		return $result;				
	}
 ?>