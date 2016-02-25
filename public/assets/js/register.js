(function () {
    var $loginForm = document.forms['register'];

    $loginForm.addEventListener('submit', function (event) {
        var $csrf = Cookies.get('X-XSRF-TOKEN');

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