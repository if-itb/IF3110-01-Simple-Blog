/*
 * dalva.js - property of dalva24.com
 * Copyright (C) 2014 Dalva
 * All Rights Reserved.
 */


var xmlhttp;
function ajaxGET(url,cfunc) { // Ajax Processor (not to be called from HTML)
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=cfunc;
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	return xmlhttp;
}
function ajaxPOST(url,data,cfunc) { // Ajax Processor (not to be called from HTML)
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=cfunc;
	xmlhttp.open("POST",url,true);
	xmlhttp.send(data);
	return xmlhttp;
}
function loadPage(url,eid) { // Ajax LoadPage Handler
	ajaxGET(url,function(){
		if (xmlhttp.readyState===4 && xmlhttp.status===200) {
			document.getElementById([eid]).innerHTML=xmlhttp.responseText;
		}
	});
}

