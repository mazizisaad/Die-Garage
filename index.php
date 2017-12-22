<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include"head.php"; ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.6.1/flatpickr.css">
  <title>Die Garage - Online Car Rental</title>
</head>

<body>
	<!-- Navbar -->
	<?php include "navbar.php"; ?>
	<!-- End Navbar -->

	<!-- Jumbotron -->
	<div class="jumbotron text-center">
		<br>
		<h2>Easy Way To Find Rental Car.</h2>
		<?php 
			if($_SESSION)
			{
				?>
				<h4 class="text-primary">Hi <?php echo $_SESSION["name"]?><h4>
				<?php
			}
			else
			{
				?>
				<a href="signUp.php" class="btn btn-success btn-md">Sign Up</a>
				<big> Now!</big>
				<?php
			}
		?> 
		<br><br>
	</div>
	<!-- End Jumbotron -->

	<!-- Search Form -->
	<div class="container">
		<div class="search-car">
			<div class="card">
				<div class="card-block">
					<h2>Find Rental Car</h2><hr>
					<form method="post" action="searchCar.php">
						<div class="form-group">
							<label for="userCarType">Car Model/ Types</label>
							<input type="text" name="userCarType" class="form-control">
						</div>
						<div class="form-group">
							<label for="userLocation">Location</label>
							<input type="text" name="userLocation" class="form-control">
						</div>
						<div class="text-right">
							<button type="submit" name="find" class="btn btn-md btn-primary"><i class="fa fa-search"></i> Find</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Search Form -->

	<!-- Footer -->
	<?php include "footer.php"; ?>
	<!-- End Footer -->

  <?php include"script.php"; ?>

</body>

</html>
