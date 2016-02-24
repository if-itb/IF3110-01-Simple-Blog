(function () {
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
        }
        return "";
    }

    var $loginForm = document.forms['login'];

    $loginForm.addEventListener('submit', function (event) {
        var $csrf = getCookie('X-XSRF-TOKEN');

        // create the hidden input field
        var $hiddenCsrf = document.createElement('input');
        $hiddenCsrf.name = 'csrf_token';
        $hiddenCsrf.type = 'hidden';
        $hiddenCsrf.value = $csrf;

        $loginForm.appendChild($hiddenCsrf);

        // continue the form submission
        var eventTarget = event.target;
        setTimeout(function () {
            eventTarget.dispatch(event);
        }, 5000);

        // something wrong with the submission
        return false;
    });
})(this);