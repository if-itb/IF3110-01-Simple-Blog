function validatedelete()
{
	var x;
	if (confirm("hapus?")==true)
	{
		x=window.location.href="delete_post.php?id=$row['id']";
	}else{
		x="cancel";
	}
}