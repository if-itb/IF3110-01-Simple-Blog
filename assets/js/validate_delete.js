function validatedelete(teks)
{
	var x;
	if (confirm("Apakah Anda yakin menghapus post ini?")==true)
		{
			x=window.location.href="delete_post.php?id="+teks;
		}else{
			x="cancel"; 
		}
}