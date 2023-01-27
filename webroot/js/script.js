$(document).ready(function () {
    $('form').submit(function (e) {

        //         // Error removing if input is correct/valid
        var removeErr = document.getElementsByClassName('error-message');
        for (i = 0; i < removeErr.length; i++) {
            removeErr[i].innerHTML = "";
        }

        errorcheck = 0;
        var letters = /^[A-Za-z\s]+$/;
        var name = $("#name").val();
        name = fname.trim();
        if (name == "") {
            $('#name-error').html("Please enter your first name");
            errorcheck = 1;
        } else if (!name.match(letters)) {
            $('#name-error').html("Please enter characters only");
            errorcheck = 1;
        } else if (name.length < 3) {
            $('#name-error').html("Please enter at least 3 characters");
            errorcheck = 1;
        }
       var  letters = /^[a-z0-9_.]+$/
        var username = $("#username").val();
        username = username.trim();
        if (username == "") {
            $('#username-error').html("Please enter your last name");
            errorcheck = 1;
        } else if (!username.match(letters)) {
            $('#username-error').html("Please enter characters only");
            errorcheck = 1;
        } else if (username.length < 3) {
            $('#username-error').html("Please enter at least 3 characters");
            errorcheck = 1;
        }
        // email validation
        var validRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var email = $("#email").val();
        email = email.trim();
        if (email == null || email == "") {
            $('#email-error').html("Please enter your email");
            errorcheck = 1;
        } else if (!email.match(validRegex)) {
            $('#email-error').html("Please enter valid email");
            errorcheck = 1;
        }

        // phone number validation
        var phone = $("#phone").val();
        phone = phone.trim();
        if (phone == "") {
            $('#phone-error').html("Please enter your phone number");
            errorcheck = 1;
        } else if (isNaN(phone)) {
            $('#phone-error').html("Please enter numeric only");
            errorcheck = 1;
        } else if (phone.length != 10) {
            $('#phone-error').html("please enter 10 digit only");
            errorcheck = 1;
        }
        // password validation
        var regularExpressionP = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        if ($("#password").val() == null) {
            // alert('$("#password").val()')
        } else {
            var password = $("#password").val();
            password = password.trim();
            if (password == "") {
                $('#password-error').html("Please enter your password");
                errorcheck = 1;
            } else if (password.length < 8) {
                $('#password-error').html("please enter at least 8 characters");
                errorcheck = 1;
            } else if (!password.match(regularExpressionP)) {
                $('#password-error').html("password should contain alteast 8 digits, 1 Special Character, one number, 1 uppercase, 1 lowercase");
                errorcheck = 1;
            }

            // confirm password validation
            var cpassword = $("#confirm-password").val();
            cpassword = cpassword.trim();
            if (cpassword == "") {
                $('#confirm-password-error').html("Please enter your confirm password");
                errorcheck = 1;
            } else if (cpassword.length < 8) {
                $('#confirm-password-error').html("please enter at least 8 characters");
                errorcheck = 1;
            } else if (!cpassword.match(regularExpressionP)) {
                $('#confirm-password-error').html("password should contain alteast 8 digits, 1 Special Character, one number, 1 uppercase, 1 lowercase");
                errorcheck = 1;
            } else if (cpassword != password) {
                $('#confirm-password-error').html("confirm password not matched with password");
                errorcheck = 1;
            }
        }

        // gender validation
        var gender = "";
        var ele = document.getElementsByName('gender');
        for (i = 0; i < ele.length; i++) {
            if (ele[i].checked) {
                gender = ele[i].value;
            }
        }
        gender = gender.trim();
        if (gender == "") {
            $('#gender-error').html("Please select your gender");
            errorcheck = 1;
        }

        if (errorcheck == 0) {

        } else {
            return false;
        }

    });

    // error removing on keyup
    $('input[name=name]').keyup(function () {
        $('#first-name-error').html("");
    });
    $('input[name=username]').keyup(function () {
        $('#username-error').html("");
    });
    $('input[name=last_name]').keyup(function () {
        $('#last-name-error').html("");
    });
    $('input[name=email]').keyup(function () {
        $('#email-error').html("");
    });
    $('input[name=phone]').keyup(function () {
        $('#phone-number-error').html("");
    });
    $('input[name=password]').keyup(function () {
        $('#password-error').html("");
    });
    $('input[name=confirm_password]').keyup(function () {
        $('#confirm-password-error').html("");
    });
    $('input[name=gender]').click(function () {
        $('#gender-error').html("");
    });

    

});