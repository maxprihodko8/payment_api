var loginForm;
var loginFormFields = {};
var error_span;
$(document).ready(function () {
    loginForm = $("#myform")[0];
    error_span = $('.error_info')[0];

    if (loginForm !== null && loginForm) {
        loginFormFields['_username'] = $(loginForm).find("input[name='_username']");
        loginFormFields['_password'] = $(loginForm).find("input[name='_password']");
        loginFormFields['_csrf_token'] = $(loginForm).find("input[name='_csrf_token']");
    }

    $(loginForm).on('submit', function (e) {
        e.preventDefault();
        var credentials = {
            '_username': loginFormFields['_username'].val(),
            '_password': loginFormFields['_password'].val(),
            '_csrf_token': loginFormFields['_csrf_token'].val()
        };
        checkLoginForm(credentials);
        return false;
    });

    function checkLoginForm(credentials) {
        $.ajax({
            type: 'POST',
            url: '/login',
            data: credentials,
            success: function (data) {
                if (data.success !== undefined) {
                    if (data.success) {
                        window.location.href = '/panel';
                    } else {
                        error_span.innerHTML = data.message;
                    }
                }
            }
        })
    }
});