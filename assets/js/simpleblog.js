function deleteConfirmationBox(id) {
	var confirm = window.confirm("Apakah Anda yakin menghapus post ini?");
	
  if (confirm) {
		window.location = "index.php?id=" + id;
	} else {
		return false;
	}
}

function addComment(comment, postId) {
  var xmlhttp= window.XMLHttpRequest ?
      new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          alert(xmlhttp.responseText); // Here is the response
  }  
          
  var parameters = "postid=" + postId + "&name=" + comment.Name + "&email=" + comment.Email + "&content=" + comment.Komentar;
  xmlhttp.open("POST", "save_comment.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    
  xmlhttp.send(parameters);
}
