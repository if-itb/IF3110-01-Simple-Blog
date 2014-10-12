function delete(pid)
{
	alert("masuk");
	if(confirm("Apakah Anda yakin menghapus post ini?"))
		window.location.replace("exec_delete_post.php?pid="+pid);
}