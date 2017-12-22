$(function() 
{
    $("#userName_error_message").hide();
    $("#emailAdd_error_message").hide();
    $("#emailProvider_error_message").hide();
    $("#userPhone_error_message").hide();
    $("#userComment_error_message").hide();

    var error_userName = false;
    var error_emailAdd = false;
    var error_emailProvider = false;
    var error_userPhone= false;
    var error_userComment = false;

    $("#userName").keyup(function() 
    {
        check_userName();
    });

    $("#emailAdd").keyup(function() 
    {
        check_emailAdd();
    });

    $("#emailProvider").focusout(function() 
    {
        check_emailProvider();
    });

    $("#userPhone").keyup(function() 
    {
        check_userPhone();
    });

    $("#userComment").keyup(function() 
    {
        check_userComment();
    });

    function check_userName() 
    {
        if($("#userName").val().length == 0)
        {
            $("#userName_error_message").html("Please Enter Name");
            $("#userName_error_message").show();
            $("#userNameField").addClass("has-danger");
            error_userName = true;
        }
        else if (validateName($("#userName").val()) == false) 
        {
            $("#userName_error_message").html("Please Enter Name");
            $("#userName_error_message").show();
            $("#userNameField").addClass("has-danger");
            error_userName = true;
        } 
        else 
        {
            $("#userName_error_message").hide();
            $("#userNameField").removeClass("has-danger");
        }

        function validateName(name)
        {
            var pattern = /^[a-zA-Z ]*$/;
            return pattern.test(name);
        }
    }

    function check_emailAdd() 
    {
        if($("#emailAdd").val().length == 0)
        {
            $("#emailAdd_error_message").html("Please Enter Email");
            $("#emailAdd_error_message").show();
            $("#emailAddField").addClass("has-danger");
            error_emailAdd = true;
        }
        else if (validateEmailAdd($("#emailAdd").val()) == false) 
        {
            $("#emailAdd_error_message").html("Please Enter Email");
            $("#emailAdd_error_message").show();
            $("#emailAddField").addClass("has-danger");
            error_emailAdd = true;
        } 
        else 
        {
            $("#emailAdd_error_message").hide();
            $("#emailAddField").removeClass("has-danger");
        }

        function validateEmailAdd(emailAdd)
        {
            var pattern = /^[+a-zA-Z0-9._-]*$/;
            return pattern.test(emailAdd);
        }
    }

    function check_emailProvider() 
    {
        var emailProvider = $("#emailProvider").val();

        if (emailProvider == "none") 
        {
            $("#emailProvider_error_message").html("Please Select Email Hosting");
            $("#emailProvider_error_message").show();
            $("#emailProviderField").addClass("has-danger");
            error_emailProvider = true;
        } 
        else 
        {
            $("#emailProvider_error_message").hide();
            $("#emailProviderField").removeClass("has-danger");
        }
    }

    function check_userPhone() 
    {
        if($("#userPhone").val().length == 0)
        {
            $("#userPhone_error_message").html("Please Enter Phone Number");
            $("#userPhone_error_message").show();
            $("#userPhoneField").addClass("has-danger");
            error_userPhone = true;
        }
        else if (validatePhone($("#userPhone").val()) == false) 
        {
            $("#userPhone_error_message").html("Please Enter Phone Number Without Special Character");
            $("#userPhone_error_message").show();
            $("#userPhoneField").addClass("has-danger");
            error_userPhone = true;
        } 
        else 
        {
            $("#userPhone_error_message").hide();
            $("#userPhoneField").removeClass("has-danger");
        }

        function validatePhone(phone)
        {
            var pattern = /^[0-9]{9,15}$/;
            return pattern.test(phone);
        }
    }

    function check_userComment() 
    {
        var userComment_length = $("#userComment").val().length;

        if (userComment_length == 0) 
        {
            $("#userComment_error_message").html("Please Enter Comment");
            $("#userComment_error_message").show();
            $("#userCommentField").addClass("has-danger");
            error_userComment = true;
        } 
        else 
        {
            $("#userComment_error_message").hide();
            $("#userCommentField").removeClass("has-danger");
        }
    }

    $("#contactForm").submit(function() 
    {
        error_userName = false;
        error_emailAdd = false;
        error_emailProvider = false;
        error_userPhone= false;
        error_userComment = false;

        check_userName();
        check_emailAdd();
        check_emailProvider();
        check_userPhone();
        check_userComment();

        if (error_userName == false && error_emailAdd == false && error_emailProvider == false && error_userPhone == false && error_userComment == false)
            return true;
        else
            return false;
    });
});