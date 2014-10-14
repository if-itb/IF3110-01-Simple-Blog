function hapusPost(id)
{
	var answer = confirm("Apakah anda yakin ingin menghapus post ini ?");
	var link = document.getElementById(id);
	if(answer)
	{
		link.href = "deletepost.php?id='id'";
	}
	else
	{
		link.href = "index.php";
	}
}