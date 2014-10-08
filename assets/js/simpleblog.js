function deleteConfirmationBox(postId) {
	var confirm = window.confirm("Apakah Anda yakin menghapus post ini?");
	
  if (confirm == true) {
		window.location = "index.php?id=" + postId;
	} else {
		return false;
	}
}
