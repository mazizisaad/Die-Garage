<?php
session_start();
include ("dbconn.php");

if(isset($_POST["registerCar"]))
	{
		$carID = $_POST["carID"];
		$carType = $_POST["carType"];
		$carRegistrationDate = $_POST["carRegistrationDate"];
		$carEngineNo = $_POST["carEngineNo"];
		$carCasisNo = $_POST["carCasisNo"];
		$carManufacturer = $_POST["carManufacturer"];
		$carManufacturingYear = $_POST["carManufacturingYear"];
		$carModelName = $_POST["carModelName"];
		$carColor = $_POST["carColor"];
		$carCapacity = $_POST["carCapacity"];
		$carTransmission = $_POST["carTransmission"];
		$carEngineCapacity = $_POST["carEngineCapacity"];
		$carFuel = $_POST["carFuel"];
		$carCondition = $_POST["carCondition"];

		$insuranceProvider = $_POST["insuranceProvider"];
		$insuranceTel = $_POST["insuranceTel"];
		$insuranceRenewDate = $_POST["insuranceRenewDate"];

		$serviceFirstHourRate = $_POST["serviceFirstHourRate"];
		$serviceNextRate = $_POST["serviceNextRate"];

		$carStatus = "Not Available";

		$sql0 = "INSERT INTO car VALUES ('". $carID ."', '". $carRegistrationDate ."', '". $carType ."', '". $carEngineNo ."', '". $carCasisNo ."', '". $carManufacturer ."', '". $carManufacturingYear ."', '". $carModelName ."', '". $carEngineCapacity ."', '". $carFuel ."', '". $carColor ."', '". $carCapacity ."', '". $carTransmission ."', '". $carCondition ."', '". $carStatus ."', '". $carID . $carEngineNo ."', '". $carID . $_SESSION['id'] ."', '". $_SESSION['id'] ."')";
		$query0 = mysqli_query($dbconn, $sql0);

		$sql1 = "INSERT INTO insurance VALUES ('". $carID . $carEngineNo ."', '". $insuranceProvider ."', '". $insuranceTel ."', '". $insuranceRenewDate ."')";
		$query1 = mysqli_query($dbconn, $sql1);

		$sql2 = "INSERT INTO service VALUES ('". $carID . $_SESSION['id'] ."', '". $serviceFirstHourRate ."', '". $serviceNextRate ."')";
		$query2 = mysqli_query($dbconn, $sql2);

		if($query0 && $query1 && $query2)
		{
			echo '<script>';
			echo 'alert("Registration Success");';
			echo 'location.href="manageCar.php";';
			echo '</script>';	
		}
		else
		{
			echo '<script>';
			echo 'alert("Registration Fail");';
			echo 'location.href="manageCar.php";';
			echo '</script>';
		}
	}

	if(isset($_POST["carDelete"]))
	{
		$carID = $_POST["carID"];

		$sql2 = "SELECT * FROM car WHERE carID = '$carID'";
		$query2 = mysqli_query($dbconn, $sql2);
		$data = mysqli_fetch_assoc($query2);

		$serviceID = $carID . $_SESSION["id"];
		$insuranceID = $data["carInsuranceID"];
		
		$sql0 = "DELETE FROM car WHERE carID = '$carID'";
		$query0 = mysqli_query($dbconn, $sql0);

		$sql1 = "DELETE FROM service WHERE serviceID = '$serviceID'";
		$query1 = mysqli_query($dbconn, $sql1);

		$sql3 = "DELETE FROM insurance WHERE insuranceID = '$insuranceID'";
		$query3 = mysqli_query($dbconn, $sql3);

		if($query0 && $query1 && $query2 && $query3)
		{
			echo '<script>';
			echo 'alert("Delete Success");';
			echo 'location.href="manageCar.php";';
			echo '</script>';	
		}
		else
		{
			echo '<script>';
			echo 'alert("Delete Fail");';
			echo 'location.href="manageCar.php";';
			echo '</script>';
		}
	}

	if(isset($_POST["carEdit"]))
	{
		$carID = $_POST["carID"];

		$sql0 = "SELECT * FROM car WHERE carID = '$carID'";
		$query0 = mysqli_query($dbconn, $sql0);
		$data0 = mysqli_fetch_assoc($query0);

		$insuranceID = $data0["carInsuranceID"];
		$carCondition = $data0["carCondition"];

		$sql1 = "SELECT * FROM insurance WHERE insuranceID = '$insuranceID'";
		$query1 = mysqli_query($dbconn, $sql1);
		$data1 = mysqli_fetch_assoc($query1);

		?>
		<?php

			if($_SESSION)
			{
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<?php include"head.php"; ?>
		  <title>Edit Car - Online Car Rental</title>
		</head>

		<body>
			<!-- Navbar -->
			<?php include "navbarDashboard.php"; ?>
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.6.1/flatpickr.css">
			<!-- End Navbar -->
			<br>
		  	<!-- Edit Car Form -->
			<div class="container">
				<div class="title-header">
					<h2>Edit Car Form</h2>
					<hr>
				</div>
			</div>
			<div class="container">
			<form method="post" action="carProcess.php">
				<div class="form-group">
					<label for="carColor">Car Color</label>
					<input type="text" name="carColor" class="form-control" value="<?php echo $data0['carColor'] ?>">
					<input type="hidden" name="carID" class="form-control" value="<?php echo $carID ?>">
				</div>
				<div class="form-group">
					<label for="carCondition">Car Condition</label>
					<select name="carCondition" class="custom-select form-control">
						<?php
						if($carCondition == "Good")
						{
							echo "<option value=Good>Good</option>";	
							echo "<option value=Excellent>Excellent</option>";
							echo "<option value=Fair>Fair</option>";
							echo "<option value=Old>Old</option>";
						}
						else if($carCondition == "Excellent")
						{
							echo "<option value=Excellent>Excellent</option>";
							echo "<option value=Good>Good</option>";
							echo "<option value=Fair>Fair</option>";
							echo "<option value=Old>Old</option>";
						}
						else if($carCondition == "Fair")
						{
							echo "<option value=Fair>Fair</option>";	
							echo "<option value=Excellent>Excellent</option>";
							echo "<option value=Good>Good</option>";
							echo "<option value=Old>Old</option>";
						}
						else if($carCondition == "Old")
						{
							echo "<option value=Old>Old</option>";	
							echo "<option value=Excellent>Excellent</option>";
							echo "<option value=Good>Good</option>";
							echo "<option value=Fair>Fair</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="insuranceProvider">Insurance Provider</label>
					<input type="text" name="insuranceProvider" class="form-control" value="<?php echo $data1['insuranceProvider'] ?>">
				</div><div class="form-group">
					<label for="insuranceTel">Insurance Contact</label>
					<input type="text" name="insuranceTel" class="form-control" value="<?php echo $data1['insuranceTel'] ?>">
				</div>
				<div class="form-group">
					<label for="insuranceRenewDate">Insurance Renew Date</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>	
						<input type="text" name="insuranceRenewDate" id="flatDate" class="form-control" value="<?php echo $data1['insuranceRenewDate'] ?>">
					</div>
				</div>
				<div class="text-center">
					<input type="submit" name="updateCar" class="btn btn-primary" value="Update">
					<a href="manageCar.php" class="btn btn-danger text-white">Back</a>
				</div>
			</form>	
			</div>
		  	<!-- End Edit Car Form -->

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
		<?php
	}

	if(isset($_POST["updateCar"]))
	{	
		$carID = $_POST["carID"];
		$carColor = $_POST["carColor"];
		$carCondition = $_POST["carCondition"];
		$insuranceProvider = $_POST["insuranceProvider"];
		$insuranceTel = $_POST["insuranceTel"];
		$insuranceRenewDate = $_POST["insuranceRenewDate"];

		$sql0 = "SELECT carInsuranceID 
				 FROM car
				 WHERE carID = '$carID'";
		$query0 = mysqli_query($dbconn, $sql0);

		$data0 = mysqli_fetch_assoc($query0);
		$insuranceID = $data0["carInsuranceID"];

		$sql1 = "UPDATE car 
				 SET carColor = '$carColor', carCondition = '$carCondition'
				 WHERE carID = '$carID'";
		$query1 = mysqli_query($dbconn, $sql1);

		$sql2 = "UPDATE insurance
				 SET insuranceProvider = '$insuranceProvider', insuranceTel = '$insuranceTel', insuranceRenewDate = '$insuranceRenewDate'
				 WHERE insuranceID = '$insuranceID'";
		$query2 = mysqli_query($dbconn, $sql2);

		if($query0 && $query1 && $query2)
		{
			echo '<script>';
			echo 'alert("Update Success");';
			echo 'location.href="manageCar.php";';
			echo '</script>';	
		}
		else
		{
			echo '<script>';
			echo 'alert("Update Fail");';
			echo 'location.href="manageCar.php";';
			echo '</script>';
		}
	}

	if(isset($_POST["carStatus"]))
	{
		$carID = $_POST["carID"];

		$sql0 = "SELECT * FROM car WHERE carID = '$carID'";
		$query0 = mysqli_query($dbconn, $sql0);
		$data0 = mysqli_fetch_assoc($query0);

		$serviceID = $data0["carServiceID"];

		$sql1 = "SELECT * FROM service WHERE serviceID = '$serviceID'";
		$query1 = mysqli_query($dbconn, $sql1);
		$data1 = mysqli_fetch_assoc($query1);

		?>
		<?php

			if($_SESSION)
			{
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<?php include"head.php"; ?>
		  <title>Update Car Status - Online Car Rental</title>
		</head>

		<body>
			<!-- Navbar -->
			<?php include "navbarDashboard.php"; ?>
			<!-- End Navbar -->
			<br>
		  	<!-- Update Car Status Form -->
			<div class="container">
				<div class="title-header">
					<h2>Update Car Status Form</h2>
					<hr>
				</div>
			</div>
			<div class="container">
			<form method="post" action="carProcess.php">
				<div class="form-group">
					<label for="carStatus">Car Status</label>
					<select name="carStatus" class="custom-select form-control">
						<?php
							if($data0["carStatus"] == "Available")
							{
								echo "<option value=Available>Available</option>";	
								echo "<option value='Not Available'>Not Available</option>";
							}
							else if($data0["carStatus"] == "Not Available")
							{
								echo "<option value='Not Available'>Not Available</option>";
								echo "<option value=Available>Available</option>";	
							}
						?>
					</select>

					<input type="hidden" name="carID" class="form-control" value="<?php echo $carID ?>">
					<input type="hidden" name="serviceID" class="form-control" value="<?php echo $serviceID ?>">
				</div>
				<div class="form-group">
					<label for="serviceFirstHourRate">First Hour Rate</label>
					<div class="input-group">
						<span class="input-group-addon">RM</span>
						<input type="text" name="serviceFirstHourRate" class="form-control" value="<?php echo $data1['serviceFirstHourRate'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="serviceNextRate">Next Hour Rate</label>
					<div class="input-group">
						<span class="input-group-addon">RM</span>
						<input type="text" name="serviceNextRate" class="form-control" value="<?php echo $data1['serviceNextRate'] ?>">
					</div>
				</div>
				<div class="text-center">
					<input type="submit" name="updateService" class="btn btn-primary" value="Update">
					<a href="manageCar.php" class="btn btn-danger text-white">Back</a>
				</div>
			</form>
			</div>
		  	<!-- End Update Car Status Form -->

			<!-- Footer -->
			<?php include "footer.php"; ?>
			<!-- End Footer -->

		  <?php include"script.php"; ?>

		  <script type="text/javascript" src="js/validateCarRegistration.js"></script>

		</body>

		</html>
		<?php
			} 
			else
			{
				header("Location: signin.php");
			}
		?>
		<?php
	}

	if(isset($_POST["updateService"]))
	{	
		$carID = $_POST["carID"];
		$serviceID = $_POST["serviceID"];
		$carStatus = $_POST["carStatus"];
		$serviceFirstHourRate = $_POST["serviceFirstHourRate"];
		$serviceNextRate = $_POST["serviceNextRate"];

		$sql0 = "UPDATE car 
				 SET carStatus = '$carStatus'
				 WHERE carID = '$carID'";
		$query0 = mysqli_query($dbconn, $sql0);

		$sql1 = "UPDATE service
				 SET serviceFirstHourRate = '$serviceFirstHourRate', serviceNextRate = '$serviceNextRate'
				 WHERE serviceID = '$serviceID'";
		$query1 = mysqli_query($dbconn, $sql1);

		if($query0 && $query1)
		{
			echo '<script>';
			echo 'alert("Update Success");';
			echo 'location.href="manageCar.php";';
			echo '</script>';	
		}
		else
		{
			echo '<script>';
			echo 'alert("Update Fail");';
			echo 'location.href="manageCar.php";';
			echo '</script>';
		}
	}

	if(isset($_POST["carPic"]))
	{
		$carID = $_POST["carID"];

		$sql0 = "SELECT * FROM carpicture WHERE carID = '$carID'";
		$query0 = mysqli_query($dbconn, $sql0);

		?>
		<?php

			if($_SESSION)
			{
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<?php include"head.php"; ?>
		  <title>Car Picture - Online Car Rental</title>
		</head>

		<body>
			<!-- Navbar -->
			<?php include "navbarDashboard.php"; ?>
			<!-- End Navbar -->
			<br>
		  	<!-- Update Car Status Form -->
			<div class="container">
				<div class="title-header">
					<h2>Car Picture</h2>
					<hr>
				</div>
			</div>
			<form method="post" action="carProcess.php">
			<div class="container text-right">
				<input type="hidden" name="carID" value="<?php echo $carID ?>">
				<input type="submit" name="addPic" class="btn btn-primary" value="Add Picture">
			</div>
			</form>
			<br>
			<div class="container">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th>No.</th>
				      <th>Car Picture</th>
				      <th>&nbsp;</th>
				    </tr>
				  </thead>
				  <?php
				  	$a = 1;
				  	while($data0 = mysqli_fetch_assoc($query0))
				  	{
				  ?>
				<form method="post" action="carProcess.php">
					  <tbody>
					    <tr>
					      <th scope="row"><?php echo $a ?></th>
					      <td>
					      	<img class="img-fluid" src="pic/<?php echo $data0["carPicName"]?>">
					      	<input type="hidden" name="carPicID" value="<?php echo $data0["carPicID"]?>">
					      	<input type="hidden" name="carPicName" value="<?php echo $data0["carPicName"]?>">
					      </td>
					      <td class="text-right">
					      	<input type="submit" name="deleteCarPic" class="btn btn-danger" value="Delete">
					      </td>
					    </tr>
					  </tbody>
				</form>
				  <?php
				  	$a++;
				  	}
				  ?>
				</table>
			</div>
		  	<!-- End Update Car Status Form -->

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
		<?php
	}

	if(isset($_POST["addPic"]))
	{
		$carID = $_POST["carID"];

		?>
		<?php

			if($_SESSION)
			{
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<?php include"head.php"; ?>
		  <title>Add Car Picture - Online Car Rental</title>
		</head>

		<body>
			<!-- Navbar -->
			<?php include "navbarDashboard.php"; ?>
			<!-- End Navbar -->
			<br>
		  	<!-- Update Car Status Form -->
			<div class="container">
				<div class="title-header">
					<h2>Add Car Picture</h2>
					<hr>
				</div>
			</div>
			<form method="post" action="carProcess.php" enctype="multipart/form-data">
				<div class="container">
					<div class="card">
						<div class="card-block">
							<div class="form-group">
								<label for="picImg">Select Picture</label>
								<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
								<input type="hidden" name="carID" value="<?php echo $carID ?>">
							</div>
							<div class="form-group">
								<input type="submit" name="addImg" class="btn btn-primary">
							</div>
						</div>
					</div>
				</div>
			</form>
		  	<!-- End Update Car Status Form -->

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
		<?php
	}

	if(isset($_POST["addImg"]))
	{
		$target_dir = "pic/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$carID = $_POST["carID"];
		// Check if image file is a actual image or fake image
		if(isset($_POST["addImg"])) 
		{
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) 
		    {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } 
		    else 
		    {
		        echo "<script>";
			  	echo "alert('Only Picture is Allowed');";
			  	echo 'location.href="manageCar.php";';
			  	echo "</script>";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) 
		{
		    echo "<script>";
		  	echo "alert('File is Already Exist');";
		  	echo 'location.href="manageCar.php";';
		  	echo "</script>";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) 
		{
		    echo "<script>";
		  	echo "alert('The Picture is Too Large');";
		  	echo 'location.href="manageCar.php";';
		  	echo "</script>";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
		    echo "<script>";
		  	echo "alert('Only Picture is Allowed');";
		  	echo 'location.href="manageCar.php";';
		  	echo "</script>";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
		    echo "<script>";
		  	echo "alert('Error Uploading Picture');";
		  	echo 'location.href="manageCar.php";';
		  	echo "</script>";
		// if everything is ok, try to upload file
		} 
		else 
		{
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		    {
		        $sql0 = "INSERT INTO carpicture VALUES ('', '". $carID ."', '". $_FILES["fileToUpload"]["name"] ."')";
				$query0 = mysqli_query($dbconn, $sql0);

		        echo "<script>";
			  	echo "alert('Upload Picture Success');";
			  	echo 'location.href="manageCar.php";';
			  	echo "</script>";
		    } 
		    else 
		    {
		        echo "<script>";
			  	echo "alert('Error Uploading File');";
			  	echo 'location.href="manageCar.php";';
			  	echo "</script>";
		    }
		}	
	}

	if(isset($_POST["deleteCarPic"]))
	{
		$carPicID = $_POST["carPicID"];
		$carPicName = $_POST["carPicName"];

		$file = "pic/" . $carPicName;
		if (!unlink($file))
		  {
		  	echo "<script>";
		  	echo "alert('Error deleting $file');";
		  	echo 'location.href="manageCar.php";';
		  	echo "</script>";
		  }
		else
		  {

		  	$sql0 = "DELETE FROM carpicture WHERE carPicID = '$carPicID'";
		  	$query0 = mysqli_query($dbconn, $sql0);
		  	
		  	echo "<script>";
		  	echo "alert('Delete Picture Success');";
		  	echo 'location.href="manageCar.php";';
		  	echo "</script>";
		  }
	}
?>