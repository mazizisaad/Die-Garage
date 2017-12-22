$(function() 
{
    $("#username_error_message").hide();
    $("#password_error_message").hide();

    var error_username = false;
    var error_password = false;

    $("#username").focusout(function() 
    {
        check_username();
    });

    $("#password").focusout(function() 
    {
        check_password();
    });

    function check_username() 
    {
        if (validateEmail($("#username").val()) == false)
        {
        	$("#username_error_message").html("Please Enter Valid Username");
            $("#username_error_message").show();
            $("#usernameField").addClass("has-danger");
            error_username = true;
        }
        else 
        {
            $("#username_error_message").hide();
            $("#usernameField").removeClass("has-danger");
        }

        function validateEmail(email) 
        {
            var pattern = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
            return pattern.test(email);
        }
    }


    function check_password() 
    {
        if (validatePassword($("#password").val()) == false)
        {
        	$("#password_error_message").html("Please Enter Valid Password");
            $("#password_error_message").show();
            $("#passwordField").addClass("has-danger");
            error_password = true;
        }
        else 
        {
            $("#password_error_message").hide();
            $("#passwordField").removeClass("has-danger");
        }

        function validatePassword(password) 
        {
            var pattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/;
            return pattern.test(password);
        }
    }

    $("#signinForm").submit(function() 
    {
        error_username = false;
        error_password = false;

        check_username();
        check_password();

        if (error_username == false && error_password == false)
            return true;
        else
            return false;
    });
});
