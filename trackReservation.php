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
  <title>Track Reservation - Online Car Rental</title>
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
			<div class="col-sm-9">
					<!-- New Reservation -->
					<div class="page-header">
						<h2>New Booking</h2>
					</div>
					<table class="table">
					  	<thead class="thead-default">
						    <tr>
						      	<th>No.</th>
						      	<th>Date</th>
						      	<th>Car</th>
						      	<th>Customer Name</th>
						      	<th>Customer Rating</th>
						      	<th>Time</th>
						      	<th>&nbsp;</th>
						    </tr>
					  	</thead>

					  	<?php
					  		$sql0 = "SELECT * FROM user s JOIN rental r ON s.userID = r.renterID 
					  				 JOIN car c ON r.carID = c.carID
					  				 WHERE c.userID = '$_SESSION[id]'
					  				 AND (rentalStatus = 'Submitted'
					  				 OR rentalStatus = 'Approve')"; 
					  		$query0 = mysqli_query($dbconn, $sql0);
					  		$row0 = mysqli_num_rows($query0);
					  	?>

					  	<tbody>
					  		<?php
					  		$a = 1;

					  		if($row0 > 0)
					  		{
					  			while($data0 = mysqli_fetch_assoc($query0))
					  			{

					  				$sql1 = "SELECT userFirstName FROM user WHERE userID = '$data0[renterID]'";
					  				$query1 = mysqli_query($dbconn, $sql1);
					  				$data1 = mysqli_fetch_assoc($query1);

					  				$sql2 = "SELECT * FROM rating WHERE userID = '$data0[renterID]'";
										$query2 = mysqli_query($dbconn, $sql2);
										$row2 = mysqli_num_rows($query2);
										$tcount = 0;

										if($row2 > 0)
										{
											while($data2 = mysqli_fetch_assoc($query2))
											{
												$tcount = $tcount + $data2["ratingCount"];
												$fcount = $tcount/$row2;
											}
										}
										else
										{
											$fcount = 0;
										}
					  		?>
					  		<form method="post" action="viewBook.php">
						    <tr>
						      	<th scope="row"><?php echo $a ?></th>
						      	<td><?php echo $data0["rentalDate"] ?></td>
						      	<td>
						      		<?php echo $data0["carID"] ?>
						      		<input type="hidden" name="rentalID" value="<?php echo $data0['rentalID'] ?>">
						      	</td>
						      	<td><?php echo $data1["userFirstName"] ?></td>
						      	<td>
						      		<div class="stars-green" data-rating="<?php echo $fcount ?>"></div>
						      	</td>
						      	<td><?php echo $data0["rentalStart"] ?></td>
						      	<td class="text-center">
						      	<?php
						      		if($data0["rentalStatus"] == 'Approve')
						      		{
						      			?>
						      			<input type="submit" name="payment" class="btn btn-success" value="Pay">
						      			<?php
						      		}
						      		else
						      		{
						      			?>
						      			<input type="submit" name="bookingStatus" class="btn btn-primary" value="Update">	
						      			<?php
						      		}
						      	?>
						      	</td>
						    </tr>
						    </form>
						    <?php
						    $a++;
								}
							}
							else
							{
								?>
								<td colspan="6" class="text-center">No Data Found</td>
								<?php
							}
						    ?>
					  	</tbody>
					</table>
					<!-- End New Reservation -->
					<br>
					<!-- Previous Reservation -->
					<div class="page-header">
						<h2>Booking History</h2>
					</div>
					<table class="table">
					  	<thead class="thead-default">
						    <tr>
						      	<th>No.</th>
						      	<th>Date</th>
						      	<th>Car</th>
						      	<th>Customer Name</th>
						      	<th>Payment Method and Total</th>
						    </tr>
					  	</thead>
					  	<?php
					  		$sql1 = "SELECT * FROM user s JOIN rental r ON s.userID = r.renterID 
					  				 JOIN car c ON r.carID = c.carID
					  				 JOIN payment p ON r.rentalID = p.rentalID
					  				 WHERE c.userID = '$_SESSION[id]'
					  				 AND rentalStatus = 'Paid'
					  				 ORDER BY r.rentalID DESC"; 
					  		$query1 = mysqli_query($dbconn, $sql1);
					  	?>
					  	<tbody>
					  	<?php
					  		$a = 1;
					  			while($data1 = mysqli_fetch_assoc($query1))
					  			{

					  				$sql2 = "SELECT userFirstName FROM user WHERE userID = '$data1[renterID]'";
					  				$query2 = mysqli_query($dbconn, $sql2);
					  				$data2 = mysqli_fetch_assoc($query2);
					  	?>
						    <tr>
						      	<th scope="row"><?php echo $a ?></th>
						      	<td><?php echo $data1["rentalDate"] ?></td>
						      	<td><?php echo $data1["carModelName"] . " (" . $data1["carID"] . ")"  ?></td>
						      	<td><?php echo $data2["userFirstName"] ?></td>
						      	<td><?php echo "RM " . $data1["paymentTotal"] ?></td>
						    </tr>
					    <?php
					    $a++;
							}
					    ?>
					  	</tbody>
					</table>
					<!-- End Previous Reservation -->
			</div>
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