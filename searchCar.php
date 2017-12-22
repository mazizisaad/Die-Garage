<?php 
	include ("dbconn.php"); 
	session_start();
	
	if(isset($_POST["find"]))
	{
		?>
		<!DOCTYPE html>
			<html lang="en">

			<head>
				<?php include"head.php"; ?>
			  <title>Search Car - Online Car Rental</title>
			</head>

			<body>
				<!-- Navbar -->
				<?php include "navbar.php"; ?>
				<!-- End Navbar -->

				<!-- Search Car -->
				<div class="container">
					<br>
					<div class="page-header">
						<h2>Search Car</h2>
						<hr>
					</div>
				</div>
				<div class="container-fluid">
					<br>
					<table class="table">
						<thead class="thead-default">
							<tr>
								<th>&nbsp;</th>
								<th>Car Model</th>
								<th>First Hour Rate</th>
								<th>Next Hour Rate</th>
								<th>Rating</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$userCarType = $_POST["userCarType"];
								$userLocation = $_POST["userLocation"];

								$sql0 = "SELECT *
										 FROM user u JOIN address a ON u.userID = a.userID
										 JOIN car c ON u.userID = c.userID
										 JOIN service s ON c.carServiceID = s.serviceID
										 WHERE c.carStatus LIKE 'Available'
										 AND a.addressCity LIKE '%$userLocation%'
										 AND (c.carType LIKE '%$userCarType%'
										 		OR c.carModelName LIKE '%$userCarType%'
										 		OR c.carManufacturer LIKE '%$userCarType%')";
								$query0 = mysqli_query($dbconn, $sql0);
								$row0 = mysqli_num_rows($query0);

								if($row0 > 0)
								{
									while($data0 = mysqli_fetch_assoc($query0))
									{
										$sql1 = "SELECT * FROM carpicture WHERE carID = '$data0[carID]'";
										$query1 = mysqli_query($dbconn, $sql1);
										$data1 = mysqli_fetch_assoc($query1);

										$sql2 = "SELECT * FROM rating WHERE carID = '$data0[carID]'";
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
												<td><img class="img-fluid" src="pic/<?php echo $data1['carPicName']; ?>" width="250" height="200"></td>
												<td><?php echo $data0["carModelName"] ?>
													<input type="hidden" name="carID" value="<?php echo $data0['carID'] ?>">
												</td>
												<td><?php echo "RM " . $data0["serviceFirstHourRate"] ?></td>
												<td><?php echo "RM " . $data0["serviceNextRate"] ?></td>
												<td>
													<div class="stars-green" data-rating="<?php echo $fcount ?>"></div>
												</td>
												<td>
													<input type="submit" name="view" value="View Details" class="btn btn-primary">
													<input type="submit" name="book" value="Book" class="btn btn-success">
												</td>
											</tr>
										</form>
										<?php
									}
								}
								else
								{
									?>
										<tr>
											<td colspan="6" class="text-center">No Result Found</td>
										</tr>
									<?php
								}
							?>
						</tbody>
					</table>
					<br>
					<div class="text-right">
						<a href="index.php" class="btn btn-danger text-white">Back</a>
					</div>
				</div>
				<!-- End Search Car -->

				<!-- Footer -->
				<?php include "footer.php"; ?>
				<?php include"script.php"; ?>
				<script type="text/javascript" src="js/viewRating.js"></script>
				<!-- End Footer -->

			  
			</body>

			</html>
		<?php
	}
	else
	{
		header("Location: index.php");
	}
?>
