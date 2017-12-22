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
					<?php 
						$sql0 = "SELECT * FROM rental r JOIN car c ON r.carID = c.carID
								 WHERE r.renterID = '$_SESSION[id]'
								 AND (r.rentalStatus = 'Submitted'
								 OR r.rentalStatus = 'Approve')";
						$query0 = mysqli_query($dbconn, $sql0);
						$row0 = mysqli_num_rows($query0);
					 ?>
					<div class="page-header">
						<h2>Booking List</h2>
					</div>
					<table class="table">
					  	<thead class="thead-default">
						    <tr>
						      	<th>No.</th>
						      	<th>Date</th>
						      	<th>Car</th>
						      	<th>Status</th>
						      	<th>&nbsp;</th>
						    </tr>
					  	</thead>
					  	<tbody>
					  		<?php
					  		$a = 1;

					  		if($row0 > 0)
					  		{

					  		while($data0 = mysqli_fetch_assoc($query0))
					  		{
					  			?>
					  			<form method="post" action="viewBook.php">
							    <tr>
							      	<th scope="row"><?php echo $a ?></th>
							      	<td><?php echo $data0["rentalDate"] ?></td>
							      	<td>
							      		<?php echo $data0["carID"] ?>
							      		<input type="hidden" name="rentalID" value="<?php echo $data0["rentalID"] ?>">
							      	</td>
							      	<td><?php echo $data0["rentalStatus"] ?></td>
							      	<td class="text-center">
							      		<?php
						      		if($data0["rentalStatus"] == 'Approve')
						      		{
						      			?>
						      			<input type="submit" name="viewRental" class="btn btn-success" value="View">
						      			<?php
						      		}
						      		else
						      		{
						      			?>
						      			<input type="submit" name="cancelReservation" class="btn btn-danger" value="Cancel">	
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
							<td colspan="5" class="text-center">No Data Found</td>
							<?php
						}
						    ?>
					  	</tbody>
					</table>
					<!-- End New Reservation -->
					<br>
					<!-- Previous Reservation -->
					<div class="page-header">
						<h2>History</h2>
					</div>
					<?php
						$sql1 = "SELECT * FROM rental WHERE renterID = '$_SESSION[id]' AND (rentalStatus = 'Paid' OR rentalStatus = 'Reject') ORDER BY rentalID DESC";
						$query1 = mysqli_query($dbconn, $sql1);

					?>
					<table class="table">
					  	<thead class="thead-default">
						    <tr>
						      	<th>No.</th>
						      	<th>Date</th>
						      	<th>Car</th>
						      	<th>Note</th>
						      	<th>Rating</th>
						    </tr>
					  	</thead>
					  	<?php 
					  		$b = 1;
					  		while($data1 = mysqli_fetch_assoc($query1))
					  		{
					  			$sql2 = "SELECT * FROM rental r JOIN payment p ON r.rentalID = p.rentalID
								 WHERE r.rentalID = '$data1[rentalID]'
								 AND r.carID = '$data1[carID]'";
								$query2 = mysqli_query($dbconn, $sql2);

								$data2 = mysqli_fetch_assoc($query2);
					  	?>
					  	<tbody>
						    <tr>
						    	<form method="post" action="viewBook.php">
						      	<th scope="row"><?php echo $b ?></th>
						      	<td><?php echo $data1["rentalDate"] ?></td>
						      	<td>
						      		<?php echo $data1["carID"] ?>
						      		<input type="hidden" name="carID" value="<?php echo $data1["carID"] ?>">	
						      	</td>
						      	<?php
						      	if($data1["rentalStatus"] == "Paid")
						      	{
						      		?>
						      		<td class="text-success"><?php echo "RM " . $data2["paymentTotal"] ?></td>	
						      		<?php
						      	}
						      	else
						      	{
						      		?>
						      		<td class="text-danger"><?php echo $data1["rentalNote"] ?></td>
						      		<?php
						      	}
						      	
						      	?>
						      	<td>
						      		<input type="submit" name="rateCar" class="btn btn-default" value="Rate This Car">
						      	</td>
						      	</form>
						    </tr>
					  	</tbody>
					  	<?php
					  	$b++;
					    }
					  	?>
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

</body>

</html>
<?php
	} 
	else
	{
		header("Location: signin.php");
	}
?>