function deletePost(id)
{
	if (confirm("Are you sure to delete this post?"))
	{
		var xmlHtppObj = new XMLHttpRequest();
		xmlHtppObj.open("POST", "delete_post.php", true);
		xmlHtppObj.onreadystatechange = function()
		{
			if ((xmlHtppObj.status == 200) && (xmlHtppObj.readyState == 4))
			{
				alert(xmlHtppObj.responseText);
				location.reload();
			}
		}
		xmlHtppObj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHtppObj.send("id=" + id);
	}

	return false;
}