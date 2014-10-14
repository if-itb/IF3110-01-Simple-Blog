function delete_post(id)
{
	var yes = confirm("Yakin hapus?");
	if(yes){
		window.location.href='A_delete_post.php?post_id='+id;
	}
}