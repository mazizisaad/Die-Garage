<?php
	session_start();
	include ("dbconn.php");

	if($_SESSION)
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include"head.php"; ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.6.1/flatpickr.css">
  <title>Add Car - Online Car Rental</title>
</head>

<body>
	<!-- Navbar -->
	<?php include "navbarDashboard.php"; ?>
	<!-- End Navbar -->
	<br>
  	<!-- Car Form -->
	<div class="container">
		<div class="page-header">
			<h2>Register Car</h2>
			<hr>
		</div>
	</div>
	<div class="container">
    <ul class="nav nav-pills nav-fill flex-column flex-sm-row setup-panel">
      <li class="nav-item">
				<a class="nav-link active" href="#carInformation">Car Information</a>
			</li>
      <li class="nav-item">
				<a class="nav-link disabled " href="#carInsurance">Insurance Information</a>
			</li>
      <li class="nav-item">
				<a class="nav-link disabled" href="#carService">Service Information</a>
			</li>
  	</ul>
	</div>
	<br>
	<div class="container">
		<form method="post" action="carProcess.php" id="registerCarForm">
			<div class="setup-content" id="carInformation">
				<div class="card">
					<div class="card-block">
						<div class="card-title">
							<h2>Car Information</h2>
						</div>
						<div class="card-text">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="carID">Car Registration No</label>
										<input type="text" name="carID" class="form-control" placeholder="Enter Car Registration Number">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="carType">Car Type</label>
										<select name="carType" class="custom-select form-control">
											<option value="none">&nbsp;</option>
											<option value="Convertible">Convertible</option>
											<option value="Coupe">Coupe</option>
											<option value="Crossover">Crossover</option>
											<option value="Hatchback">Hatchback</option>
											<option value="MPV">Multi-purpose Vehicle (MPV)</option>
											<option value="Sedan">Sedan</option>
											<option value="SUV">Sport Utility Vehicle (SUV)</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="carRegistrationDate">Registration Date</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" name="carRegistrationDate" id="flatDate2" class="form-control">	
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="carEngineNo">Engine Serial Number</label>
										<input type="text" name="carEngineNo" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="carCasisNo">Casis Serial Number</label>
										<input type="text" name="carCasisNo" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="carManufacturer">Car Manufacturer</label>
										<input type="text" name="carManufacturer" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="carManufacturingYear">Manufactured Year</label>
										<select name="carManufacturingYear" class="custom-select form-control">
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
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="carModelName">Model Name</label>
								<input type="text" name="carModelName" class="form-control">
							</div>
							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<label for="carColor">Car Color</label>
										<input type="text" name="carColor" class="form-control">
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label for="carCapacity">Car Capacity</label>
										<select name="carCapacity" class="custom-select form-control">
											<option value="none">&nbsp;</option>
											<option value="2">2 Persons</option>
											<option value="4">4 Persons</option>
											<option value="5">5 Persons</option>
											<option value="8">8 Persons</option>
										</select>
									</div>
								</div>
								<div class="col-4">
									<div class="form-groups">
										<label for="carTransmission">Car Transmission</label>
										<select name="carTransmission" class="custom-select form-control">
											<option value="none">&nbsp;</option>
											<option value="Automatic">Automatic Transmission</option>
											<option value="Manual">Manual Transmission</option>
											<option value="Semi Auto">Semi Auto Transmission</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="carEngineCapacity">Engine Capacity</label>
										<input type="text" name="carEngineCapacity" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="carFuel">Engine Fuel</label>
										<select name="carFuel" class="custom-select form-control">
											<option value="none">&nbsp;</option>
											<option value="Petrol">Petrol</option>
											<option value="Diesel">Diesel</option>
											<option value="NGV">Natural Gas for Verhicle (NGV)</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="carCondition">Car Condition</label>
								<select name="carCondition" class="custom-select form-control">
									<option value="none">&nbsp;</option>
									<option value="Excellent">Excellent</option>
									<option value="Good">Good</option>
									<option value="Fair">Fair</option>
									<option value="Old">Old</option>
								</select>
							</div>
							<div>
								<a id="nextInsuranceInfo" class="btn btn-primary text-white">Next</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="setup-content" id="carInsurance">
				<div class="card">
					<div class="card-block">
						<div class="card-title">
							<h2>Insurance Information</h2>
						</div>
						<div class="card-text">
							<div class="form-group">
								<label for="insuranceProvider">Insurance Provider</label>
								<input type="text" name="insuranceProvider" class="form-control">
							</div>
							<div class="form-group">
								<label for="insuranceTel">Insurance Contact Number</label>
								<input type="text" name="insuranceTel" class="form-control">
							</div>
							<div class="form-group">
								<label for="insuranceRenewDate">Insurance Renew Date</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" name="insuranceRenewDate" id="flatDate" class="form-control">
								</div>
							</div>
							<div>
								<a id="backCarInformation" class="btn btn-danger text-white">Back</a>
								<a id="nextServiceInformation" class="btn btn-primary text-white">Next</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="setup-content" id="carService">
				<div class="card">
					<div class="card-block">
						<div class="card-title">
							<h2>Service Information</h2>
						</div>
						<div class="card-text">
							<div class="form-group">
								<label for="serviceFirstHourRate">First Hour Rate</label>
								<div class="input-group">
									<span class="input-group-addon">RM</span>
									<input type="text" name="serviceFirstHourRate" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="serviceNextRate">Next Hour Rate</label>
								<div class="input-group">
									<span class="input-group-addon">RM</span>
									<input type="text" name="serviceNextRate" class="form-control">
								</div>
							</div>
							<div>
								<a id="backInsuranceInformation" class="btn btn-danger text-white">Back</a>
								<input type="submit" name="registerCar" class="btn btn-success" value="Submit">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
  	<!-- End Car Form -->

	<!-- Footer -->
	<?php include "footer.php"; ?>
	<!-- End Footer -->

  <?php include"script.php"; ?>

  <script type="text/javascript" src="js/validateCarRegistration.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.6.1/flatpickr.js"></script>
    <script>
      flatpickr("#flatDate", {
				dateFormat: "d/m/Y",
				minDate: "today"
			});

      flatpickr("#flatDate2", {
				dateFormat: "d/m/Y"
			});
    </script>

</body>

</html>
<?php
	} 
	else
	{
		header("Location: signin.php");
	}
?>