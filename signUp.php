<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include"head.php"; ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.6.1/flatpickr.css">
  <title>FAQ - Online Car Rental</title>
</head>

<body>
	<!-- Navbar -->
	<?php include "navbar.php"; ?>
	<!-- End Navbar -->
	<br>
	<!-- Form Wizard -->
	<div class="container">
		<div class="page-header">
			<h2>Sign Up Form</h2>
			<hr>
		</div>
	</div>
	<div class="container">
    <ul class="nav nav-pills nav-fill flex-column flex-sm-row setup-panel">
      <li class="nav-item">
				<a class="nav-link active" href="#personalInfo">Personal Details</a>
			</li>
      <li class="nav-item">
				<a class="nav-link disabled " href="#addressInfo">Address Information</a>
			</li>
      <li class="nav-item">
				<a class="nav-link disabled" href="#licenseInfo">License Information</a>
			</li>
      <li class="nav-item">
				<a class="nav-link disabled" href="#agreement">Category and Agreement</a>
			</li>
  	</ul>
</div>
<br>
<div class="container">
	<form method="post" action="process.php" id="signupForm">
		<div class="setup-content" id="personalInfo">
			<div class="card">
				<div class="card-block">
					<div class="card-title">
						<h2>Personal Information</h2>
					</div>
					<div class="card-text">
						<div class="form-group row">
						  <div class="col-6" id="firstNameField">
				              <label for="firstName">First Name</label>
				              <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter First Name">
			              <span class="text-danger" id="firstName_error_message"></span>
			              </div>
			              <div class="col-6" id="lastNameField">
				              <label for="lastName">Last Name</label>
				              <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter Last Name">
			              <span class="text-danger" id="lastName_error_message"></span>
			              </div>
			            </div>
			            <div class="form-group row">
			              <div class="col-4" id="idFrontField">
			                <label for="idFront">IC Number</label>
			                <input type="text" name="idFront" id="idFront" class="form-control" placeholder="First Digits" maxlength="6">
			              <span class="text-danger" id="idFront_error_message"></span>
			              </div>
			              <div class="col-4" id="idMiddleField">
			                <label for="idMiddle">&nbsp;</label>
			                <input type="text" name="idMiddle" id="idMiddle" class="form-control" placeholder="Second Digits" maxlength="2">
			              <span class="text-danger" id="idMiddle_error_message"></span>
			              </div>
			              <div class="col-4" id="idBackField">
			                <label for="idBack">&nbsp;</label>
			                <input type="text" name="idBack" id="idBack" class="form-control" placeholder="Third Digits" maxlength="4">
			              <span class="text-danger" id="idBack_error_message"></span>
			              </div>
			            </div>
			            <div class="form-group row">
			              <div class="col-4" id="dateField">
			                <label for="date">Date of Birth</label>
			                <select class="custom-select form-control" name="date" id="date">
			                  <option value="none">&nbsp;</option>
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							  <option value="6">6</option>
							  <option value="7">7</option>
							  <option value="8">8</option>
							  <option value="9">9</option>
							  <option value="10">10</option>
							  <option value="11">11</option>
							  <option value="12">12</option>
							  <option value="13">13</option>
							  <option value="14">14</option>
							  <option value="15">15</option>
							  <option value="16">16</option>
							  <option value="17">17</option>
							  <option value="18">18</option>
							  <option value="19">19</option>
							  <option value="20">20</option>
							  <option value="21">21</option>
							  <option value="22">22</option>
							  <option value="23">23</option>
							  <option value="24">24</option>
							  <option value="25">25</option>
							  <option value="26">26</option>
							  <option value="27">27</option>
							  <option value="28">28</option>
							  <option value="29">29</option>
							  <option value="30">30</option>
							  <option value="31">31</option>
							</select>
			              <span class="text-danger" id="date_error_message"></span>
			              </div>
			              <div class="col-4" id="monthField">
			                <label for="month">Month</label>
			                <select class="custom-select form-control" name="month" id="month">
			                  <option value="none">&nbsp;</option>
							  <option value="01">January</option>
							  <option value="02">February</option>
							  <option value="03">March</option>
							  <option value="04">April</option>
							  <option value="05">May</option>
							  <option value="06">Jun</option>
							  <option value="07">July</option>
							  <option value="08">August</option>
							  <option value="09">September</option>
							  <option value="10">October</option>
							  <option value="11">November</option>
							  <option value="12">December</option>
							</select>
			              <span class="text-danger" id="month_error_message"></span>
			              </div>
			              <div class="col-4" id="yearField">
			                <label for="year">Year</label>
			                <select class="custom-select form-control" name="year" id="year">
			                  <option value="none">&nbsp;</option>
							  <option value="2017">2017</option>
							  <option value="2016">2016</option>
							  <option value="2015">2015</option>
							  <option value="2014">2014</option>
							  <option value="2013">2013</option>
							  <option value="2012">2012</option>
							  <option value="2011">2011</option>
							  <option value="2010">2010</option>
							  <option value="2009">2009</option>
							  <option value="2008">2008</option>
							  <option value="2007">2007</option>
							  <option value="2006">2006</option>
							  <option value="2005">2005</option>
							  <option value="2004">2004</option>
							  <option value="2003">2003</option>
							  <option value="2002">2002</option>
							  <option value="2001">2001</option>
							  <option value="2000">2000</option>
							  <option value="1999">1999</option>
							  <option value="1998">1998</option>
							  <option value="1997">1997</option>
							  <option value="1996">1996</option>
							  <option value="1995">1995</option>
							  <option value="1994">1994</option>
							  <option value="1993">1993</option>
							  <option value="1992">1992</option>
							  <option value="1991">1991</option>
							  <option value="1990">1990</option>
							  <option value="1989">1989</option>
							  <option value="1987">1987</option>
							  <option value="1986">1986</option>
							</select>
			              <span class="text-danger" id="year_error_message"></span>
			              </div>
			            </div>
			            <div class="form-group" id="phoneField">
							<label for="phone">Phone Number</label>
							<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Your Phone Number">
						<span class="text-danger" id="phone_error_message"></span>
						</div>
			            <div class="form-group row">
			              <div class="col-6" id="emailAddField">
			                <label for="emailAdd">Email</label>
			                <input type="text" name="emailAdd" id="emailAdd" class="form-control" placeholder="Email Address">
			              <span class="text-danger" id="emailAdd_error_message"></span>
			              </div>
			              <div class="col-6">
			                <label for="emailProvider">&nbsp;</label>
			                <div class="input-group" id="emailProviderField">
			                	<span class="input-group-addon">@</span>
			                	<select class="custom-select form-control" name="emailProvider" id="emailProvider">
			                		<option value="none">&nbsp;</option>
			                		<option value="hotmail">hotmail</option>
			                		<option value="gmail">gmail</option>
			                		<option value="rocketmail">rocketmail</option>
			                		<option value="ymail">ymail</option>
			                	</select>
			                	<span class="input-group-addon">.com</span>
			                </div>
			                <span class="text-danger" id="emailProvider_error_message"></span>
			              </div>
			            </div>
			            <div class="form-group row">
			              <div class="col-6" id="passwordField">
				              <label for="password">Password</label>
				              <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
			              <span class="text-danger" id="password_error_message"></span>
			              </div>
			              <div class="col-6" id="confirmPasswordField">
				              <label for="confirmPassword">Confirm Password</label>
				              <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Re-enter Password">
			              <span class="text-danger" id="confirmPassword_error_message"></span>
			              </div>
			            </div>
						<div>
							<a id="nextAddressInfo" class="btn btn-primary text-white">Next</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="setup-content" id="addressInfo">
			<div class="card">
				<div class="card-block">
					<div class="card-title">
						<h2>Address Information</h2>
					</div>
					<div class="card-text">
						<div class="form-group" id="addressLine1Field">
							<label for="addressLine1">Address Line 1</label>
							<input type="text" name="addressLine1" class="form-control" id="addressLine1" placeholder="Enter Address Line 1">
							<span class="text-danger" id="addressLine1_error_message"></span>
						</div>
						<div class="form-group" id="addressLine2Field">
							<label for="addressLine2">Address Line 2</label>
							<input type="text" name="addressLine2" id="addressLine2" class="form-control" placeholder="Enter Address Line 2">
							<span class="text-danger" id="addressLine2_error_message"></span>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-6" id="addressPostcodeField">
									<label for="addressPostcode">Postcode</label>
									<input type="text" name="addressPostcode" id="addressPostcode" class="form-control" placeholder="Enter Postcode">
									<span class="text-danger" id="addressPostcode_error_message"></span>
								</div>
								<div class="col-6" id="addressCityField">
									<label for="addressCity">City</label>
									<input type="text" name="addressCity" class="form-control" id="addressCity" placeholder="Enter City">
									<span class="text-danger" id="addressCity_error_message"></span>					
								</div>
							</div>
						</div>
						<div class="form-group" id="addressStateField">
							<label for="addressState">State</label>
							<input type="text" name="addressState" id="addressState" class="form-control" placeholder="Enter State">
							<span class="text-danger" id="addressState_error_message"></span>
						</div>
						<div>
							<a id="backPersonalInfo" class="btn btn-danger text-white">Back</a>
							<a id="nextLicenseInfo" class="btn btn-primary text-white">Next</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="setup-content" id="licenseInfo">
			<div class="card">
				<div class="card-block">
					<div class="card-title">
						<h2>License Information</h2>
					</div>
					<div class="card-text">
						<div class="form-group" id="licenseNoField">
							<label for="licenseNo">License Number</label>
							<input type="text" name="licenseNo" id="licenseNo" class="form-control" placeholder="Enter License Number">
							<span class="text-danger" id="licenseNo_error_message"></span>
						</div>
						<div class="form-group">
							<label for="licenseExpDate">Expired Date</label>
							<div class="input-group" id="licenseExpDateField">
								<input type="text" name="licenseExpDate" class="form-control licenseExpDate" id="flatDate" placeholder="Enter License Expiry Date">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							<span class="text-danger" id="licenseExpDate_error_message"></span>
						</div>
						<div>
							<a id="backAddressInfo" class="btn btn-danger text-white">Back</a>
							<a id="nextAgreement" class="btn btn-primary text-white">Next</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="setup-content" id="agreement">
			<div class="card">
				<div class="card-block">
					<div class="card-title">
						<h2>Category and Agreement</h2>
					</div>
					<div class="card-text">
						<div id="userCategoryField">
							<label for="userCategory">Category</label><br>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="radio" name="userCategory" id="userCategory" class="form-check-input checked" value="Owner"> Owner
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="radio" name="userCategory" id="userCategory" class="form-check-input" value="Renter"> Renter
								</label>
							</div>
							<span class="text-danger" id="userCategory_error_message"></span>
						</div>
						<br>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="checkAgreement" class="form-check-input" required>
								I understand all the terms and conditions stated in the <a href="">Term and Condition Policy</a>
							</label>
						</div>
						<br>
						<div>
							<a id="backLicenseInfo" class="btn btn-danger text-white">Back</a>
							<input type="submit" name="signUp" class="btn btn-success" value="Sign Up">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
	<!-- End Form Wizard -->

	<!-- Footer -->
	<?php include "footer.php"; ?>
	<!-- End Footer -->

  <?php include"script.php"; ?>

	<!-- Progress Bar Script -->
	
	<script type="text/javascript" src="js/validateSignup.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.6.1/flatpickr.js"></script>
    <script>
      flatpickr("#flatDate", {
				dateFormat: "d/m/Y",
				minDate: "today"
			});
    </script>
    <script type="text/javascript" src="js/address.js"></script>
	<!-- End Progress Bar Script-->
</body>

</html>
