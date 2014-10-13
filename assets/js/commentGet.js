function commentGet() {
	var post_id = document.getElementById("Post_Id").value.toString();

	var xmlhttp;

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("Comments").innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET", "get_all_comments.php?post_id=" + post_id, true);
	xmlhttp.send();
}
