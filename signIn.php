<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include"head.php"; ?>
    <title>FAQ - Online Car Rental</title>
</head>

<body>
	<!-- Navbar -->
	<?php include "navbar.php"; ?>
	<!-- End Navbar -->

	<!-- Sign In Form -->
	<br>
	<div class="container">
		<div class="card">
		 	<div class="card-block">
		 		<div class="card-title text-center">
		 			<h2>Sign In</h2>
		 			<hr>
		 		</div>
		 		<div class="card-text">
		 			<form method="post" action="process.php" id="signinForm">
		 				<div class="form-group" id="usernameField">
		 					<label for="username">Username</label>
		 					<div class="input-group">
		 						<span class="input-group-addon"><i class="fa fa-user"></i></span>
		 						<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
		 					</div>
		 					<span class="text-danger" id="username_error_message"></span>
		 				</div>
		 				<div class="form-group" id="passwordField">
		 					<label for="password">Password</label>
		 					<div class="input-group">
		 						<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		 						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
		 					</div>
		 					<span class="text-danger" id="password_error_message"></span>
		 				</div>
		 				<div class="form group text-right">
		 					<input type="submit" name="signin" class="btn btn-primary" value="Sign In">
		 				</div>
		 			</form>
		 		</div>
		 	</div>
		 </div>
 		<div>
 			<div class="text-center">
	 			<small>Forget your own username/password?</small>
	 			<small><a href="">Click Here</a></small>
	 		</div>
	 		<div class="text-center">
	 			<small>Do not have an account yet?</small><br>
	 			<small><a href="signUp.php">Sign Up</a></small>
	 		</div>
 		</div>	
	</div>
	<!-- End Sign In Form -->

	<!-- Footer -->
	<?php include "footer.php"; ?>
	<!-- End Footer -->

    <?php include"script.php"; ?>
    <script type="text/javascript" src="js/validateSignin.js"></script>

</body>

</html>