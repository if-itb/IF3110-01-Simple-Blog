
function ajax_comment_load()
{
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (ajax.readyState==4 && ajax.status==200) {
            document.getElementById('').innderHTML = ajax.responseText;
        }
    }
    ajax.open("GET", url_load_comments, true);
	ajax.send();
}

function ajax_