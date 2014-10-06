function hapus(id)
{
	var konfirmasi = confirm('Apakah anda yakin menghapus post ini?');
	if(konfirmasi)
	{
		var formObjects = document.forms['post'];
		var formElements = formObjects.elements['id'];
		formElements.value = id.substring(1);
		formObjects.action = "deletePost.php";
		formObjects.submit();
	}
}

function edit(id)
{
	var formObjects = document.forms['post'];
	var formElements = formObjects.elements['id'];
	formElements.value = id.substring(1);
	formObjects.action = "editPost.php";
	formObjects.submit();
}

function comment(id)
{
	var formObjects = document.forms['post'];
	var formElements = formObjects.elements['id'];
	formElements.value = id.substring(1);
	formObjects.action = "post.php";
	formObjects.submit();	
}
