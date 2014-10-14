var http = createRequestObject();
function createRequestObject(){
    var obj;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        obj = new XMLHttpRequest();
    }
    return obj;
}
function sendRequest(id){
    var uname = document.getElementById('Nama').value;
    var comment = document.getElementById('Komentar').value;
    var email = document.getElementById('Email').value;
    var QueryString = 'comment.php?id='+id+'&nama='+uname+'&komentar='+comment+'&email='+email;
    http.open('GET', QueryString);
    if (uname && comment && email){
        if (validateEmail(email)){
            http.onreadystatechange = handleResponse;
            http.send(null);
        } else {
            alert("Format email salah");
        }
    } else {
        alert("Form harus diisi semua");
    }
}
function handleResponse(){
    if (http.readyState == 4){
        var response = http.responseText;
        if (response != ''){
            document.getElementById('listcomment').innerHTML = response;
        } else {
            document.getElementById('listcomment').innerHTML = 'wrong';
        }
    }
}
function validateEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}