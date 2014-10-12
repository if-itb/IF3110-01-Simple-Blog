function validateEmail(){
    var email = document.forms['commentForm']['email'].value;
    var regex = /[\w\d\._-]*@[\w\d]*\.\w*/;
    if(regex.test(email)){
        addComment();
        resetForm();
        alert("Comment successfully added");
    }
    else{
        alert("Invalid email format!");
        return false;
    }
}

function addComment(){
    var xmlhttp = getXMLHTTPObject();
    var post_id = document.forms['commentForm']['post-id'].value;
    var name = document.forms['commentForm']['name'].value;
    var email = document.forms['commentForm']['email'].value;
    var content = document.forms['commentForm']['content'].value;
    var param = "post-id="+post_id+"&name="+name+"&email="+email+"&content="+content;
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4){
            loadComment();
        }
    }
    xmlhttp.open("POST", "comment.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(param);

}

function getXMLHTTPObject(){
    var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}

function loadComment(){
    var xmlhttp = getXMLHTTPObject();
    var post_id = document.forms['commentForm']['post-id'].value;
    var param = "post-id="+post_id;
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("comment").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "load_comment.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(param);
}

function resetForm(){
    document.forms['commentForm']['name'].value = "";
    document.forms['commentForm']['email'].value = "";
    document.forms['commentForm']['content'].value = "";
}