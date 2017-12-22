<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include"head.php"; ?>
    <title>Contact Us - Online Car Rental</title>
</head>

<body>
	<!-- Navbar -->
	<?php include "navbar.php"; ?>
	<br>
	<!-- End Navbar -->

	<!-- Contact Us -->
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<!-- Contact Details -->
				<div class="container">
					<div class="page-header">
						<h2>Contact Details</h2>
						<hr>
					</div>
					<div>
						<i class="fa fa-phone">
							<medium> Phone Number</medium>
						</i>
						<p>
							04-9662620<br>
							04-9662621
						</p>
						<hr>
						<i class="fa fa-fax">
							<medium> Fax Number</medium>
						</i>
						<p>04-9662622</p>
						<hr>
						<i class="fa fa-map-marker">
							<medium> Address</medium>
						</i>
						<p>	
							No. 1441 Jalan Perdana,<br>
    						Perdana Height,<br>
    						40200 Selangor,<br>
    						Malaysia.
    					</p>
    					<hr>
					</div>
				</div>
				<!-- End Contact Details -->
			</div>
			<div class="col-md-7">
				<!-- Contact Form -->
				<div class="container">
					<div class="page-header">
						<h2>Contact Form</h2>
						<hr>
					</div>
					<div class="card">
						<div class="card-block">
							<div class="card-title">
								<h4>Place Your Comment Here</h4>
							</div>
							<div class="card-subtitle text-muted">
								<h6>We will respond instantly!</h6>
							</div>
							<form method="post" action="process.php" id="contactForm">
								<div class="form-group" id="userNameField">
									<label for="userName">Name</label>
									<input type="text" name="userName" id="userName" class="form-control" placeholder="Enter Your Name">
								</div>
								<span class="text-danger" id="userName_error_message"></span>
								<div class="form-group row">
					              <div class="col-6" id="emailAddField">
					                <label for="emailAdd">Email</label>
					                <input type="text" name="emailAdd" id="emailAdd" class="form-control" placeholder="Email Address">
					              	<span class="text-danger" id="emailAdd_error_message"></span>
					              </div>
					              <div class="col-6" id="emailProviderField">
					                <label for="emailProvider">&nbsp;</label>
					                <div class="input-group">
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
					            

								<div class="form-group" id="userPhoneField">
									<label for="userPhone">Phone Number</label>
									<input type="text" name="userPhone" id="userPhone" class="form-control" placeholder="Enter Your Phone Number">
								</div>
								<span class="text-danger" id="userPhone_error_message"></span>
								<div class="form-group" id="userCommentField">
									<label for="userComment">Comment</label>
									<textarea name="userComment" id="userComment" class="form-control" placeholder="Enter Your Comment"></textarea>
								</div>
								<span class="text-danger" id="userComment_error_message"></span>
								<div class="form-group text-right">
									<input type="reset" name="reset" class="btn btn-danger" value="Clear">
									<input type="submit" name="contact" class="btn btn-primary" value="Submit">
								</div>
							</form>						
						</div>						
					</div>
				</div>
				<!-- End Contact Form -->
			</div>
		</div>
	</div>
	<!-- End Contact Us -->

	<!-- Footer -->
	<?php include"footer.php"; ?>
	<!-- End Footer -->

    <?php include"script.php"; ?>
    <script type="text/javascript" src="js/validateContact.js"></script>
</body>

</html>