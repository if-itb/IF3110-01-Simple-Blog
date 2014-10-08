function deleteConfirmationBox(id) {
	var confirm = window.confirm("Apakah Anda yakin menghapus post ini?");
	
  if (confirm) {
		window.location = "index.php?id=" + id;
	} else {
		return false;
	}
}
