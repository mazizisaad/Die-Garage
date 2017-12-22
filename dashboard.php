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
  <title>Dashboard - Online Car Rental</title>
</head>

<body>
	<!-- Navbar -->
	<?php include "navbarDashboard.php"; ?>
	<!-- End Navbar -->
	<br>
  <!-- Dashboard -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
			<!-- Dashboard Menu -->
			<?php include('dashboardMenu.php'); ?>
			<!-- End Dsahboard Menu -->
			</div>
			<?php 
				if($_SESSION["category"] == "Owner") 
				{
					$id = $_SESSION["id"];

					$sql0 = "SELECT * 
							 FROM user u JOIN address a ON u.userID = a.userID
							 JOIN license l ON u.userLicense = l.licenseID
							 WHERE u.userID = '$id'";
					$query0 = mysqli_query($dbconn, $sql0);
					$data0 = mysqli_fetch_assoc($query0);

					?>
						<div class="col-sm-9">
							<div class="container">
								<div class="card">
									<div class="card-block">
										<div class="page-header">
											<h2>Personal Details</h2>
											<hr>
										</div>
										<div>
											<table class="table table-striped">
											  <tbody>
											    <tr>
											      <th scope="row">Name</th>
											      <td><?php echo $data0["userFirstName"] . " " . $data0["userLastName"] ?></td>
											    </tr>
											    <tr>
											      <th scope="row">Address</th>
											      <td><?php echo $data0["addressLine1"] . "<br>" . $data0["addressLine2"] ."<br>". $data0["addressPostcode"] . ", " . $data0["addressCity"] ."<br>". $data0["addressState"]?></td>
											    </tr>
											    <tr>
											      <th scope="row">Email</th>
											      <td><?php echo $data0["userEmail"] ?></td>
											    </tr>
											    <tr>
											      <th scope="row">Contact Number</th>
											      <td><?php echo $data0["userPhone"] ?></td>
											    </tr>
											    <tr>
											      <th scope="row">Lisence Expiracy Date</th>
											      <td><?php echo $data0["licenseExpDate"] ?></td>
											    </tr>
											  </tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<br>
							<?php
								$sql0 = "SELECT * FROM car WHERE userID = '$id'";
								$query0 = mysqli_query($dbconn, $sql0);
							?>
							<div class="container">
								<div class="page-header">
									<h2>Car Details</h2>
									<hr>
								</div>
								<table class="table">
								<?php
									$a = 1;
									while($data0 = mysqli_fetch_assoc($query0))
									{

										$sql1 = "SELECT * FROM rating WHERE carID = '$data0[carID]'";
										$query1 = mysqli_query($dbconn, $sql1);
										$row1 = mysqli_num_rows($query1);
										$tcount = 0;

										$sql2 = "SELECT * FROM car WHERE carID = '$data0[carID]'";
										$query2 = mysqli_query($dbconn, $sql2);
										$data2 = mysqli_fetch_assoc($query2);

										$sql3 = "SELECT * FROM rental WHERE carID = '$data0[carID]'";
										$query3 = mysqli_query($dbconn, $sql3);
										$row3 = mysqli_num_rows($query3);

										if($row1 > 0)
										{
											while($data1 = mysqli_fetch_assoc($query1))
											{
												$tcount = $tcount + $data1["ratingCount"];
												$fcount = $tcount/$row1;
											}
										}
										else
										{
											$fcount = 0;
										} 
								?>
									    <tr>
									    	<td><?php echo $a ?></td>
								    		<td>
								    			<?php echo $data2["carManufacturer"]. "/ " . $data2["carModelName"] . "/ " . $data2["carID"] ?>
								    		</td>
								    		<td class="text-center">
								    			Rental Count: <h3 class="text-warning"><?php echo $row3 ?></h3>
								    		</td>
								    		<td class="text-center">
								    			<div class="stars-green" data-rating="<?php echo $fcount ?>"></div>
								    		</td>
									    </tr>
								  <?php
								  	$a++;
									}
								  ?>
								</table>
							</div>
					<?php
				}
				else
				{
					$id = $_SESSION["id"];

					$sql0 = "SELECT * 
							 FROM user u JOIN address a ON u.userID = a.userID
							 JOIN license l ON u.userLicense = l.licenseID
							 WHERE u.userID = '$id'";
					$query0 = mysqli_query($dbconn, $sql0);
					$data0 = mysqli_fetch_assoc($query0);
					?>
						<div class="col-sm-9">
							<div class="container">
								<div class="card">
									<div class="card-block">
										<div class="page-header">
											<h2>Personal Details</h2>
											<hr>
										</div>
										<div>
											<table class="table table-striped">
											  <tbody>
											    <tr>
											      <th scope="row">Name</th>
											      <td><?php echo $data0["userFirstName"] . " " . $data0["userLastName"] ?></td>
											    </tr>
											    <tr>
											      <th scope="row">Address</th>
											      <td><?php echo $data0["addressLine1"] . "<br>" . $data0["addressLine2"] ."<br>". $data0["addressPostcode"] . ", " . $data0["addressCity"] ."<br>". $data0["addressState"]?></td>
											    </tr>
											    <tr>
											      <th scope="row">Email</th>
											      <td><?php echo $data0["userEmail"] ?></td>
											    </tr>
											    <tr>
											      <th scope="row">Contact Number</th>
											      <td><?php echo $data0["userPhone"] ?></td>
											    </tr>
											    <tr>
											      <th scope="row">Lisence Expiracy Date</th>
											      <td><?php echo $data0["licenseExpDate"] ?></td>
											    </tr>
											  </tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="container">
								<div class="card">
									<div class="card-block">
										<div class="page-header">
											<h2>Rental Details</h2>
											<hr>
										</div>
										<?php
											$sql1 = "SELECT * FROM rating WHERE userID = '$id'";
											$query1 = mysqli_query($dbconn, $sql1);
											$row1 = mysqli_num_rows($query1);
											$tcount = 0;

											if($row1 > 0)
											{
												while($data1 = mysqli_fetch_assoc($query1))
												{
													$tcount = $tcount + $data1["ratingCount"];
													$fcount = $tcount/$row1;
												}
											}
											else
											{
												$fcount = 0;
											} 

											$sql2 = "SELECT * FROM rental WHERE renterID = '$id' AND rentalStatus = 'Paid'";
											$query2 = mysqli_query($dbconn, $sql2);
											$row2 = mysqli_num_rows($query2);
										?>
										<div class="row">
											<div class="col-6">
												<div class="card">
													<div class="card-block text-center">
														<h4>Your Personal Rating</h4>
														<div class="stars-green" data-rating="<?php echo $fcount ?>"></div>
													</div>
												</div>
											</div>
											<div class="col-6">
												<div class="card">
													<div class="card-block text-center">
														<h4>Number of Car Rented</h4>
														<h3 class="text-warning"><?php echo $row2 ?></h3>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
			?>
		</div>
	</div>
  <!-- End Dashboard -->

	<!-- Footer -->
	<?php include "footer.php"; ?>
	<!-- End Footer -->

  <?php include"script.php"; ?>
  <script type="text/javascript" src="js/viewRating.js"></script>

</body>

</html>

<?php
	} 
	else
	{
		header("Location: signin.php");
	}
?>
