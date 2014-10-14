function getBaseURL() {
	var baseURL = window.location.href;

	return baseURL.substring(0, baseURL.lastIndexOf('/'));
}

/**
 * Check if an email is valid
 * @param  {String} emailStr the email
 * @return {boolean}         true if the string is a valid email
 */
function validateEmail(emailStr) {
	var ret;

	if (typeof emailStr === "string") {
		var pattern = new RegExp("[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}");
		ret = pattern.test(emailStr);
	} else {
		ret = false;
	}

	return ret;
}

/**
 * Post a comment
 */
function postComment() {
	var ajax;

	// Email: check first
	var email = document.getElementById('Email');
	if(!validateEmail(email.value)) {
		alert('Email is not valid!');
		email.focus();
	} else {
		// get the other fields
		email = email.value;
		var nama = document.getElementById('Nama').value;
		var komentar = document.getElementById('Komentar').value;

		// prepare response
		if(window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
		} else { // for IE6, IE5
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}

		// this is the response
		ajax.onreadystatechange = function() {
			// response caught
			var ready = 4, ok = 200;
			if(ajax.readyState == ready && ajax.status == ok) {
				var json = JSON.parse(ajax.responseText);

				//alert(typeof json);
				if(json.toLowerCase() == "true") {
					alert("Komentar berhasil masuk!");
				} else {
					alert("Komentar gagal masuk! Alasan: " + json.toLowerCase());
				}
			} else {
				alert("Comment cannot be posted! Please try again.");
			}
		}

		if(typeof postId != 'undefined') {
			var boundary = "---------[boundary]--------";
			var url = getBaseURL() + "/assets/scripts/comment.php?method=add&id=" + postId;

			var data = "nama=" + encodeURIComponent(nama) + "&email=" + encodeURIComponent(email) + "&komentar=" + encodeURIComponent(komentar);

			ajax.open("POST", url, true);
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			ajax.send(data);
		} else {
			throw "postId not defined!";
		}
	}
}

function refreshComments() {
	var commentNode = document.getElementById('comments');
	while(commentNode.firstChild) {
		commentNode.removeChild(commentNode.firstChild);
	}

	getComments();
}

/**
 * Get the nae of type of object instance
 * @param  {Object} object any JS object
 * @return {String}        String that represents the type of object
 */
function getInstanceName(object) {
    if (object === null) {
        return "null";
    }
    else if (object === undefined) {
        return "undefined";
    }
    else if (object.constructor === String.constructor) {
        return "String";
    }
    else if (object.constructor === [].constructor) {
        return "Array";
    }
    else if (object.constructor === {}.constructor) {
        return "Object";
    }
    else {
        return "don't know";
    }
}

/**
 * Get the comments for a particular post
 */
function getComments() {
	var ajax;

	if(window.XMLHttpRequest) {
		ajax = new XMLHttpRequest();
	} else { // for IE6, IE5
		ajax = new ActiveXObject("Microsoft.XMLHTTP");
	}

	// this is the response
	ajax.onreadystatechange = function() {
		// response caught
		var ready = 4, ok = 200;
		if(ajax.readyState == ready && ajax.status == ok) {
			var json = JSON.parse(ajax.responseText);

			if(getInstanceName(json) == "Array") {
				var comments = document.getElementById("comments");

				for(var i in json) {
					comments.appendChild(createCommentNode(json[i]));
				}
			}
		} else {
			//
		}
	}

	if(typeof postId != 'undefined') {
		var url = getBaseURL() + "/assets/scripts/comment.php?method=get&id=" + postId;
		ajax.open("GET", url, true);
		ajax.send();
	} else {
		throw "postId not defined!";
	}
}

/**
 * Membuat sebuah node komentar dari sebuah array JSON
 * @param  {JSON} jsonObject sebuah objek JSON, yang memiliki nama, email, tanggal, dan komentar
 * @return sebuah node komentar
 */
function createCommentNode(jsonObject) {
	// create the parent node
	var parentNode = document.createElement("li");

	var parentClass = document.createAttribute("class");
	parentClass.value = "art-list-item";
	parentNode.setAttributeNode(parentClass);

	// create the author and time base
	var authorTimeNode = document.createElement("div");
	var authorTimeClass = document.createAttribute("class");
	authorTimeClass.value = "art-list-item-title-and-time";
	authorTimeNode.setAttributeNode(authorTimeClass);

	// create the author node
	var authorNode = document.createElement("h2");
	var authorClass = document.createAttribute("class");
	authorClass.value = "art-list-title";
	authorNode.setAttributeNode(authorClass);

	var authorAnchor = document.createElement("a");
	var authorAnchorHref = document.createAttribute("href");
	authorAnchorHref.value = "mailto:" + jsonObject.email;
	authorAnchor.setAttributeNode(authorAnchorHref);
	authorAnchor.innerHTML = jsonObject.nama;

	// append the authorAnchor
	authorNode.appendChild(authorAnchor);

	// append the author
	authorTimeNode.appendChild(authorNode);

	// create the time
	var timeNode = document.createElement("div");
	var timeClass = document.createAttribute("class");
	timeClass.value = "art-list-time";
	timeNode.setAttributeNode(timeClass);
	timeNode.innerHTML = jsonObject.waktu;
	
	// append the time
	authorTimeNode.appendChild(timeNode);

	// append author and time to base node
	parentNode.appendChild(authorTimeNode);

	// create the content
	var content = document.createElement("p");
	content.innerHTML = jsonObject.komentar;

	parentNode.appendChild(content);

	return parentNode;
}