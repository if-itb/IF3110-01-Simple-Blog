function validateDeletion() {
/*	Post deletion confirmation */
	var answer = confirm ("Are you sure want to delete this post?");
	if (answer) {
		return true;
	}
	else return false;
}