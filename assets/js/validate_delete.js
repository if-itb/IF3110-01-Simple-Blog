function validatedelete(teks)
{
	var x;
	var y = teks;
	var z = "delete_post.php?id=";
	var res = z.concat(y);
	if (confirm("Apakah Anda yakin menghapus post ini?")==true)
		{
			x=window.location.href=res;
		}else{
			x="cancel"; 
		}
}