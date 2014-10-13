function confirmDelete(){
	if (confirm("Do you sure you want to delete this post? This action cannot be undone.")){
		alert("Post Deleted!");
		return true;
	}
	else{
		return false;
	}
}