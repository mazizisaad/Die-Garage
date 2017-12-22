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
  <title>Manage Car - Online Car Rental</title>
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
					<!-- Add Car -->
					<a href="addCar.php" class="btn btn-primary float-right" src="addCar.php">Add Car</a>
					<!-- End Add Car -->
					<!-- Car List -->
					<br>
					<br>
					<table class="table">
					  	<thead class="thead-default">
						    <tr>
						      	<th>No.</th>
						      	<th>Car</th>
						      	<th>Registration Number</th>
						      	<th>Status</th>
						      	<th>&nbsp;</th>
						    </tr>
					  	</thead>
					  	<tbody>
					  		<?php
					  			$a = 1;
					  			$sql0 = "SELECT * FROM car WHERE userID = '$_SESSION[id]'";
					  			$query0 = mysqli_query($dbconn, $sql0);



					  			while($data = mysqli_fetch_assoc($query0))
					  			{
					  				$sql1 = "SELECT * FROM carpicture WHERE carID = '$data[carID]'";
									$query1 = mysqli_query($dbconn, $sql1);
									$data1 = mysqli_fetch_assoc($query1);
				  					?>
					  				<form method="post" action="carProcess.php">
					  				<tr>
								      	<th scope="row"><?php echo $a; ?></th>
								      	<td><img src="pic/<?php echo $data1['carPicName']; ?>" width="100" height="100" class="img-fluid"></td>
								      	<td>
								      		<?php echo $data['carID']; ?>
								      		<input type="hidden" name="carID" value="<?php echo $data['carID']; ?>">
								      	</td>
								      	<td><?php echo $data['carStatus']; ?></td>
								      	<td class="text-center">
								      		<?php 

								      			$sql1 = "SELECT * FROM rental 
									  					 WHERE carID = '$data[carID]'
									  					 AND rentalStatus = 'Approve'";
									  			$query1 = mysqli_query($dbconn, $sql1);
									  			$row1 = mysqli_num_rows($query1);
					  			
								      			if($row1 > 0)
								      			{
								      				echo "This Car Is Currently Rented";
								      			}
								      			else
								      			{
										      		?>
										      		<input type="submit" name="carPic" class="btn btn-default" value="Picture"></input>
										      		<input type="submit" name="carStatus" class="btn btn-success" value="Update"></input>
										      		<input type="submit" name="carEdit" class="btn btn-warning" value="Edit"></input>
										      		<input type="submit" name="carDelete" class="btn btn-danger" value="Delete"></input>
								      				<?php
								      			}
								      		?>
								      	</td>
								    </tr>
					  				</form>
					  				<?php
								    $a = $a + 1;
					  			}
					  		?>
					  	</tbody>
					</table>
					<!-- End Car List -->
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