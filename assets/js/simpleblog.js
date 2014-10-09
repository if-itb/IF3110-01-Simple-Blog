function deleteConfirmationBox(id) {
	var confirm = window.confirm("Apakah Anda yakin menghapus post ini?");
	
  if (confirm) {
		window.location = "index.php?id=" + id;
	} else {
		return false;
	}
}

function addComment(comment, postId) {
  if (!validateComment(comment)) {
    return false;
  }

  var xmlhttp= window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      loadComment(postId);
    }
  }  
          
  var parameters = "postid=" + postId + "&name=" + comment.Nama.value + "&email=" + comment.Email.value + "&content=" + comment.Komentar.value;
  xmlhttp.open("POST", "comment.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    
  xmlhttp.send(parameters);
}

function loadComment(postId) {
  var xmlhttp= window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("comments").innerHTML = xmlhttp.responseText;
      document.getElementById("Nama").value = '';
      document.getElementById("Email").value = '';
      document.getElementById("Komentar").value = '';
    }
  }
          
  var parameters = "postid=" + postId;
  xmlhttp.open("GET", "comment.php?" + parameters, true);    
  xmlhttp.send();
}

function validatePost(post) {
  var regex = /^(\d{1,2})-(\d{1,2})-(\d{4})$/
  if (!regex.test(post.Tanggal.value)) {
    alert("Format Tanggal Tidak Valid");
    return false;
  }

  var dd = post.Tanggal.value.split("-")[0];
  var mm = post.Tanggal.value.split("-")[1];
  var yy = post.Tanggal.value.split("-")[2];
  var date = new Date(yy, mm - 1, dd);
  if ((date.getDate() != dd) || (date.getMonth() + 1 != mm) || (date.getFullYear() != yy)) {
    alert("Angka Yang Dimasukkan Bukanlah Tanggal");
    return false;
  }

  var today = new Date();
  if (today > date) {
    alert("Tanggal Harus Lebih Dari Hari Ini");
    return false;
  }

  return true;
}

function validateComment(comment) {
  if (isBlank(comment.Nama.value)) {
    alert("Nama Tidak Boleh Kosong");
    return false;
  }

  if (isBlank(comment.Email.value)) {
    alert("Nama Tidak Boleh Kosong");
    return false;
  }

  if (isBlank(comment.Komentar.value)) {
    alert("Komentar Tidak Boleh Kosong");
    return false;
  } 

  var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!regex.test(comment.Email.value)) {
    alert("Email Yang Dimasukkan Tidak Valid");
    return false;
  } 
  
  return true;
}

function isBlank(str) {
  return (!str || 0 === str.length || /^\s*$/.test(str));
}