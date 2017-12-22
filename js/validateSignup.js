$(function()
{
	// checking
	$("#firstName_error_message").hide();
	$("#lastName_error_message").hide();
	$("#idFront_error_message").hide();
	$("#idMiddle_error_message").hide();
	$("#idBack_error_message").hide();
	$("#date_error_message").hide();
	$("#month_error_message").hide();
	$("#year_error_message").hide();
	$("#phone_error_message").hide();
	$("#emailAdd_error_message").hide();
	$("#emailProvider_error_message").hide();
	$("#password_error_message").hide();
	$("#confirmPassword_error_message").hide();
	$("#addressLine1_error_message").hide();
	$("#addressLine2_error_message").hide();
	$("#addressPostcode_error_message").hide();
	$("#addressCity_error_message").hide();
	$("#addressState_error_message").hide();
	$("#licenseNo_error_message").hide();
	$("#licenseExpDate_error_message").hide();

	var error_firstName = false;
	var error_lastName = false;
	var error_idFront = false;
	var error_idMiddle = false;
	var error_idBack = false;
	var error_date = false;
	var error_month = false;
	var error_year = false;
	var error_phone = false;
	var error_emailAdd = false;
	var error_emailProvider = false;
	var error_password = false;
	var error_confirmPassword = false;
	var error_addressLine1 = false;
	var error_addressLine2 = false;
	var error_addressPostcode = false;
	var error_addressCity = false;
	var error_addressState = false;
	var error_licenseNo = false;
	var error_licenseExpDate = false;

	$("#firstName").keyup(function()
	{
		check_firstName();
	});

	$("#lastName").keyup(function()
	{
		check_lastName();
	});

	$("#idFront").keyup(function()
	{
		check_idFront();
	});

	$("#idMiddle").keyup(function()
	{
		check_idMiddle();
	});

	$("#idBack").keyup(function()
	{
		check_idBack();
	});

	$("#date").focusout(function()
	{
		check_date();
	});

	$("#month").focusout(function()
	{
		check_month();
	});

	$("#year").focusout(function()
	{
		check_year();
	});

	$("#phone").focusout(function()
	{
		check_phone();
	});

	$("#emailAdd").focusout(function()
	{
		check_emailAdd();
	});

	$("#emailProvider").focusout(function()
	{
		check_emailProvider();
	});

	$("#password").focusout(function() 
    {
        check_password();
    });

    $("#confirmPassword").keyup(function() 
    {
        check_confirmPassword();
    });

    $("#addressLine1").keyup(function() 
    {
        check_addressLine1();
    });

    $("#addressLine2").keyup(function() 
    {
        check_addressLine2();
    });

    $("#addressPostcode").keyup(function() 
    {
        check_addressPostcode();
    });

    $("#addressCity").keyup(function() 
    {
        check_addressCity();
    });

    $("#addressState").keyup(function() 
    {
        check_addressState();
    });

    $("#licenseNo").keyup(function() 
    {
        check_licenseNo();
    });

    $(".licenseExpDate").keyup(function() 
    {
        check_licenseExpDate();
    });

	function check_firstName()
	{
		if($("#firstName").val().length == 0)
        {
            $("#firstName_error_message").html("Please Enter First Name");
            $("#firstName_error_message").show();
            $("#firstNameField").addClass("has-danger");
            error_firstName = true;
        }
        else if (validateName($("#firstName").val()) == false) 
        {
            $("#firstName_error_message").html("Please Enter Valid First Name");
            $("#firstName_error_message").show();
            $("#firstNameField").addClass("has-danger");
            error_firstName = true;
        } 
        else 
        {
            $("#firstName_error_message").hide();
            $("#firstNameField").removeClass("has-danger");
        }

        function validateName(name)
        {
            var pattern = /^[a-zA-Z ]*$/;
            return pattern.test(name);
        }

        return error_firstName;
	}

	function check_lastName()
	{
		if($("#lastName").val().length == 0)
        {
            $("#lastName_error_message").html("Please Enter Last Name");
            $("#lastName_error_message").show();
            $("#lastNameField").addClass("has-danger");
            error_lastName = true;
        }
        else if (validateName($("#lastName").val()) == false) 
        {
            $("#lastName_error_message").html("Please Enter Valid Last Name");
            $("#lastName_error_message").show();
            $("#lastNameField").addClass("has-danger");
            error_lastName = true;
        } 
        else 
        {
            $("#lastName_error_message").hide();
            $("#lastNameField").removeClass("has-danger");
        }

        function validateName(name)
        {
            var pattern = /^[a-zA-Z ]*$/;
            return pattern.test(name);
        }

        return error_lastName;
	}

	function check_idFront()
	{
		if($("#idFront").val().length == 0)
        {
            $("#idFront_error_message").html("Please Enter First Digits");
            $("#idFront_error_message").show();
            $("#idFrontField").addClass("has-danger");
            error_idFront = true;
        }
        else if (validateFirstID($("#idFront").val()) == false) 
        {
            $("#idFront_error_message").html("Please Enter Valid First Digits");
            $("#idFront_error_message").show();
            $("#idFrontField").addClass("has-danger");
            error_idFront = true;
        } 
        else 
        {
            $("#idFront_error_message").hide();
            $("#idFrontField").removeClass("has-danger");
        }

        function validateFirstID(id)
        {
            var pattern = /^[0-9]{6,}$/;
            return pattern.test(id);
        }

        return error_idFront;
	}

	function check_idMiddle()
	{
		if($("#idMiddle").val().length == 0)
        {
            $("#idMiddle_error_message").html("Please Enter Second Digits");
            $("#idMiddle_error_message").show();
            $("#idMiddleField").addClass("has-danger");
            error_idMiddle = true;
        }
        else if (validateSecondID($("#idMiddle").val()) == false) 
        {
            $("#idMiddle_error_message").html("Please Enter Valid Second Digits");
            $("#idMiddle_error_message").show();
            $("#idMiddleField").addClass("has-danger");
            error_idMiddle = true;
        } 
        else 
        {
            $("#idMiddle_error_message").hide();
            $("#idMiddleField").removeClass("has-danger");
        }

        function validateSecondID(id)
        {
            var pattern = /^[0-9]{2,}$/;
            return pattern.test(id);
        }

        return error_idMiddle;
	}

	function check_idBack()
	{
		if($("#idBack").val().length == 0)
        {
            $("#idBack_error_message").html("Please Enter Third Digits");
            $("#idBack_error_message").show();
            $("#idBackField").addClass("has-danger");
            error_idBack = true;
        }
        else if (validateThirdID($("#idBack").val()) == false) 
        {
            $("#idBack_error_message").html("Please Enter Valid Third Digits");
            $("#idBack_error_message").show();
            $("#idBackField").addClass("has-danger");
            error_idBack = true;
        } 
        else 
        {
            $("#idBack_error_message").hide();
            $("#idBackField").removeClass("has-danger");
        }

        function validateThirdID(id)
        {
            var pattern = /^[0-9]{4,}$/;
            return pattern.test(id);
        }

        return error_idBack;
	}

	function check_date()
	{
		if($("#date").val() == "none")
        {
            $("#date_error_message").html("Please Select Date");
            $("#date_error_message").show();
            $("#dateField").addClass("has-danger");
            error_date = true;
        }
        else 
        {
            $("#date_error_message").hide();
            $("#dateField").removeClass("has-danger");
        }

        return error_date;
	}

	function check_month()
	{
		if($("#month").val() == "none")
        {
            $("#month_error_message").html("Please Select Month");
            $("#month_error_message").show();
            $("#monthField").addClass("has-danger");
            error_month = true;
        }
        else 
        {
            $("#month_error_message").hide();
            $("#monthField").removeClass("has-danger");
        }

        return error_month;
	}

	function check_year()
	{
		if($("#year").val() == "none")
        {
            $("#year_error_message").html("Please Select Year");
            $("#year_error_message").show();
            $("#yearField").addClass("has-danger");
            error_year = true;
        }
        else 
        {
            $("#year_error_message").hide();
            $("#yearField").removeClass("has-danger");
        }

        return error_year;
	}

	function check_phone()
	{
		if($("#phone").val().length == 0)
        {
            $("#phone_error_message").html("Please Enter Phone Number");
            $("#phone_error_message").show();
            $("#phoneField").addClass("has-danger");
            error_phone = true;
        }
        else if (validatePhone($("#phone").val()) == false) 
        {
            $("#phone_error_message").html("Please Enter Phone Number Without Special Character");
            $("#phone_error_message").show();
            $("#phoneField").addClass("has-danger");
            error_phone = true;
        } 
        else 
        {
            $("#phone_error_message").hide();
            $("#phoneField").removeClass("has-danger");
        }

        function validatePhone(phone)
        {
            var pattern = /^[0-9]{7,11}$/;
            return pattern.test(phone);
        }

        return error_phone;
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

        return error_emailAdd;
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

        return error_emailProvider;
    }

    function check_password() 
    {
        if ($("#password").val().length == 0)
        {
        	$("#password_error_message").html("Please Enter Password");
            $("#password_error_message").show();
            $("#passwordField").addClass("has-danger");
            error_password = true;
        }
        else if (validatePassword($("#password").val()) == false)
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

        return error_password;
    }

    function check_confirmPassword()
    {
    	if($("#confirmPassword").val() != $("#password").val())
    	{
    		$("#confirmPassword_error_message").html("Password Not Match");
            $("#confirmPassword_error_message").show();
            $("#confirmPasswordField").addClass("has-danger");
            error_confirmPassword = true;
    	}
    	else
    	{
    		$("#confirmPassword_error_message").hide();
            $("#confirmPasswordField").removeClass("has-danger");
    	}

    	return error_confirmPassword;
    }

    function check_addressLine1()
    {
    	if($("#addressLine1").val() == 0)
    	{
    		$("#addressLine1_error_message").html("Please Enter Address");
            $("#addressLine1_error_message").show();
            $("#addressLine1Field").addClass("has-danger");
            error_addressLine1 = true;
    	}
    	else
    	{
    		$("#addressLine1_error_message").hide();
            $("#addressLine1Field").removeClass("has-danger");
    	}

    	return error_addressLine1;
    }

    function check_addressLine2()
    {
    	if($("#addressLine2").val() == 0)
    	{
    		$("#addressLine2_error_message").html("Please Enter Address");
            $("#addressLine2_error_message").show();
            $("#addressLine2Field").addClass("has-danger");
            error_addressLine2 = true;
    	}
    	else
    	{
    		$("#addressLine2_error_message").hide();
            $("#addressLine2Field").removeClass("has-danger");
    	}

    	return error_addressLine2;
    }

    function check_addressPostcode()
    {
    	if($("#addressPostcode").val() == 0)
    	{
    		$("#addressPostcode_error_message").html("Please Enter Postcode");
            $("#addressPostcode_error_message").show();
            $("#addressPostcodeField").addClass("has-danger");
            error_addressPostcode = true;
    	}
    	else if (validatePostcode($("#addressPostcode").val()) == false) 
        {
            $("#addressPostcode_error_message").html("Please Enter Valid Postcode");
            $("#addressPostcode_error_message").show();
            $("#addressPostcodeField").addClass("has-danger");
            error_addressPostcode = true;
        } 
    	else
    	{
    		$("#addressPostcode_error_message").hide();
            $("#addressPostcodeField").removeClass("has-danger");
    	}

    	function validatePostcode(postcode)
        {
            var pattern = /^[0-9]{5,5}$/;
            return pattern.test(postcode);
        }

    	return error_addressPostcode;
    }

    function check_addressCity()
    {
    	if($("#addressCity").val() == 0)
    	{
    		$("#addressCity_error_message").html("Please Enter City");
            $("#addressCity_error_message").show();
            $("#addressCityField").addClass("has-danger");
            error_addressCity = true;
    	}
    	else
    	{
    		$("#addressCity_error_message").hide();
            $("#addressCityField").removeClass("has-danger");
    	}

    	return error_addressCity;
    }

    function check_addressState()
    {
    	if($("#addressState").val() == 0)
    	{
    		$("#addressState_error_message").html("Please Enter State");
            $("#addressState_error_message").show();
            $("#addressStateField").addClass("has-danger");
            error_addressState = true;
    	}
    	else
    	{
    		$("#addressState_error_message").hide();
            $("#addressStateField").removeClass("has-danger");
    	}

    	return error_addressState;
    }

    function check_licenseNo()
    {
    	if($("#licenseNo").val() == 0)
    	{
    		$("#licenseNo_error_message").html("Please Enter License Number");
            $("#licenseNo_error_message").show();
            $("#licenseNoField").addClass("has-danger");
            error_licenseNo = true;
    	}
    	else
    	{
    		$("#licenseNo_error_message").hide();
            $("#licenseNoField").removeClass("has-danger");
    	}

    	return error_licenseNo;
    }

    function check_licenseExpDate()
    {
    	if($(".licenseExpDate").val() == 0)
    	{
    		$(".licenseExpDate_error_message").html("Please Enter License Expiracy Date");
            $(".licenseExpDate_error_message").show();
            $(".licenseExpDateField").addClass("has-danger");
            error_licenseNo = true;
    	}
    	else
    	{
    		$(".licenseExpDate_error_message").hide();
            $(".licenseExpDateField").removeClass("has-danger");
    	}

    	return error_licenseExpDate;
    }

    // Step


			var navListItems = $('.setup-panel li a'),
					allWells = $('.setup-content');

			allWells.hide();

			navListItems.click(function(e)
			{
					e.preventDefault();
					var $target = $($(this).attr('href')),
							$item = $(this).closest('a');

					if (!$item.hasClass('disabled')) {
							navListItems.closest('a').removeClass('active');
							$item.addClass('active');
							allWells.hide();
							$target.show();
					}
			});

			$('ul.setup-panel li a.active').trigger('click');

			// DEMO ONLY //

			$('#nextAddressInfo').click(function(e) 
			{
				error_firstName = false;
				error_lastName = false;
				error_idFront = false;
				error_idMiddle = false;
				error_idBack = false;
				error_date = false;
				error_month = false;
				error_year = false;
				error_phone = false;
				error_emailAdd = false;
				error_emailProvider = false;
				error_password = false;
				error_confirmPassword = false;

				check_firstName();
				check_lastName();
				check_idFront();
				check_idMiddle();
				check_idBack();
				check_date();
				check_month();
				check_year();
				check_phone();
				check_emailAdd();
				check_emailProvider();
				check_password();
				check_confirmPassword();

				if (error_firstName == false && error_firstName == false && error_lastName == false && error_idFront == false && error_idMiddle == false && error_idBack == false && error_date == false && error_month == false && error_year == false && error_phone == false && error_emailAdd == false && error_emailProvider == false && error_password == false && error_confirmPassword == false)
				{
					$('.setup-panel li a:eq(1)').removeClass('disabled');
					$('.setup-panel li a[href="#addressInfo"]').trigger('click');	
				}
				else
				{
					alert("Please Fill All The Form Fields");
				}
			})

			$('#backPersonalInfo').on('click', function(e) {
					$('.setup-panel li a[href="#personalInfo"]').trigger('click');
			})

			$('#nextLicenseInfo').click(function(e) 
			{
				error_addressLine1 = false;
				error_addressLine2 = false;
				error_addressPostcode = false;
				error_addressCity = false;
				error_addressState = false;

				check_addressLine1();
				check_addressLine2();
				check_addressPostcode();
				check_addressCity();
				check_addressState();

				if (error_addressLine1 == false && error_addressLine2 == false && error_addressPostcode == false && error_addressCity == false && error_addressState == false)
				{
					$('.setup-panel li a:eq(2)').removeClass('disabled');
					$('.setup-panel li a[href="#licenseInfo"]').trigger('click');
				}
				else
				{
					alert("Please Fill All The Form Fields");
				}
			})

			$('#backAddressInfo').on('click', function(e) {
					$('.setup-panel li a[href="#addressInfo"]').trigger('click');
			})

			$('#nextAgreement').on('click', function(e) 
			{
				error_licenseNo = false;
				error_licenseExpDate = false;

				check_licenseNo();
				check_licenseExpDate();

				if(error_licenseNo == false && error_licenseExpDate == false)
				{
					$('.setup-panel li a:eq(3)').removeClass('disabled');
					$('.setup-panel li a[href="#agreement"]').trigger('click');
				}
				else
				{
					alert("Please Fill All The Form Fields");
				}
			})

			$('#backLicenseInfo').on('click', function(e) {
					$('.setup-panel li a[href="#licenseInfo"]').trigger('click');
			})

			$('#nextLicenseInfo').on('click', function(e) {
					$('.setup-panel li a:eq(2)').removeClass('disabled');
					$('.setup-panel li a[href="#licenseInfo"]').trigger('click');
			})

	$("#signupForm").submit(function() 
    {
        error_firstName = false;
        error_lastName = false;
        error_idFront = false;
        error_idMiddle = false;
        error_idBack = false;
        error_date = false;
        error_month = false;
        error_year = false;
        error_phone = false;
        error_emailAdd = false;
        error_emailProvider = false;
        error_password = false;
        error_confirmPassword = false;
        error_addressLine1 = false;
        error_addressLine2 = false;
        error_addressPostcode = false;
        error_addressCity = false;
        error_addressState = false;
        error_licenseNo = false;
        error_licenseExpDate = false;

        check_firstName();
        check_lastName();
        check_idFront();
        check_idMiddle();
        check_idBack();
        check_date();
        check_month();
        check_year();
        check_phone();
        check_emailAdd();
        check_emailProvider();
        check_password();
        check_confirmPassword();
        check_addressLine1();
        check_addressLine2();
        check_addressPostcode();
        check_addressCity();
        check_addressState();
        check_licenseNo();
        check_licenseExpDate();

        if (error_firstName == false && error_lastName == false && error_idFront == false && error_idMiddle == false && error_idBack == false && error_date == false && error_month == false && error_year == false && error_phone == false && error_emailAdd == false && error_emailProvider == false && error_password == false && error_confirmPassword == false && error_addressLine1 == false && error_addressLine2 == false && error_addressPostcode == false && error_addressCity == false && error_addressState == false && error_licenseNo == false && error_licenseExpDate == false)
        {
            return true;
        } 
                
        else
        {
            return false;
            alert("Please Fill All The Fields");
        }
    });

});