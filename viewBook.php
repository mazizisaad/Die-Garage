<?php
	include ("dbconn.php");
	session_start();

	if($_SESSION)
	{	
		$cat = $_SESSION["category"];
	}
	else
	{
		$cat = "";
	}

	if(isset($_POST["view"]))
	{
		$carID = $_POST["carID"];

		$sql0 = "SELECT *
				 FROM user u JOIN address a ON u.userID = a.userID
				 JOIN car c ON u.userID = c.userID
				 JOIN service s ON c.carServiceID = s.serviceID
				 WHERE c.carID = '$carID'";
		$query0 = mysqli_query($dbconn, $sql0);
		$data0 = mysqli_fetch_assoc($query0);

		$sql1 = "SELECT * FROM rating WHERE carID = '$carID'";
		$query1 = mysqli_query($dbconn, $sql1);
		$row1 = mysqli_num_rows($query1);
		$tcount = 0;
		while($data1 = mysqli_fetch_assoc($query1))
		{
			$tcount = $tcount + $data1["ratingCount"];
			$fcount = $tcount/$row1;
		}
		?>
		<!DOCTYPE html>
			<html lang="en">

			<head>
			    <?php include"head.php"; ?>
			    <title>View Car - Online Car Rental</title>
			</head>

			<body>
				<!-- Navbar -->
				<?php include "navbar.php"; ?>
				<!-- End Navbar -->

				<!-- View -->
				<div class="container">
					<br>
					<div class="header-title">
						<h2>View Car</h2>
						<hr>
					</div>
				</div>
				<div class="container">
					<div class="card">
						<div class="card-block">
							<div class="card-title">
								<h3><?php echo $carID . " "?></h3>
								<div class="stars-green" data-rating="<?php echo $fcount ?>"></div>
							</div>
							<div class="card-text">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-sm">
										  <tbody>
										    <tr>
										      <th scope="row">Brand/ Model</th>
										      <td><?php echo $data0["carManufacturer"] . "/ " . $data0["carModelName"] ?></td>
										    </tr>
										    <tr>
										      <th scope="row">Type</th>
										      <td><?php echo $data0["carType"] ?></td>
										    </tr>
										    <tr>
										      <th scope="row">Fuel</th>
										      <td><?php echo $data0["carFuel"] ?></td>
										    </tr>
										    <tr>
										      <th scope="row">Capacity</th>
										      <td><?php echo $data0["carCapacity"] . " Persons" ?></td>
										    </tr>
										    <tr>
										      <th scope="row">Transmission</th>
										      <td><?php echo $data0["carTransmission"] ?></td>
										    </tr>
										    <tr>
										      <th scope="row">Condition</th>
										      <td><?php echo $data0["carCondition"] ?></td>
										    </tr>
										  </tbody>
										</table>
									</div>
									<div class="col-md-6">
										<table class="table table-sm">
										  <tbody>
										    <tr>
										      <th scope="row">Owner</th>
										      <td><?php echo $data0["userFirstName"] . " " . $data0["userLastName"] ?></td>
										    </tr>
										    <tr>
										      <th scope="row">Contact</th>
										      <td><?php echo $data0["userPhone"] ?></td>
										    </tr>
										    <tr>
										      <th scope="row">Address</th>
										      <td>
										      	<?php echo $data0["addressLine1"] . "<br>" . $data0["addressLine2"] . "<br>" . $data0["addressCity"] . "<br>" . $data0["addressState"]?>
										      	
										      </td>
										    </tr>
										    <tr>
										      <th scope="row">Service Rate</th>
										      <td>
										      	<?php echo "First Hour: RM " . $data0["serviceFirstHourRate"] . "<br>"  . "Next Hour: RM " . $data0["serviceNextRate"] ?>
										      </td>
										    </tr>
										  </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<table class="table">
					  <thead class="thead-default">
					    <tr>
					      <th class="text-center">Car Image</th>
					    </tr>
					  </thead>
					  <?php
							$sql6 = "SELECT * FROM carpicture WHERE carID = '$carID'";
							$query6 = mysqli_query($dbconn, $sql6);

							while($data6 = mysqli_fetch_assoc($query6)) 
							{
						?>
							  <tbody>
							    <tr>
							      <td class="text-center"><img class="img-fluid" src="pic/<?php echo $data6['carPicName']; ?>"></td>
							    </tr>
							  </tbody>
					  <?php
					  		}
					  ?>
					</table>
				</div>
				<div class="container text-right">
					<a class="btn btn-danger text-white" href="index.php">Back</a>
				</div>
				<!-- End View -->

				<!-- Footer -->
				<?php include"footer.php"; ?>
				<!-- End Footer -->

			    <?php include"script.php"; ?>
			    <script type="text/javascript" src="js/viewRating.js"></script>
			</body>

			</html>
		<?php
	}

	else if(isset($_POST["book"]))
	{
		if($cat == "Renter")
		{
			$carID = $_POST["carID"];

			$sql0 = "SELECT *
					 FROM user u JOIN address a ON u.userID = a.userID
					 JOIN car c ON u.userID = c.userID
					 JOIN service s ON c.carServiceID = s.serviceID
					 WHERE c.carID = '$carID'";
			$query0 = mysqli_query($dbconn, $sql0);
			$data0 = mysqli_fetch_assoc($query0);

			?>
			<!DOCTYPE html>
				<html lang="en">

				<head>
				    <?php include"head.php"; ?>
				    <title>Book Car - Online Car Rental</title>
				</head>

				<body>
					<!-- Navbar -->
					<?php include "navbar.php"; ?>
					<!-- End Navbar -->

					<!-- View -->
					<br>
					<div class="container">
						<div class="header-title">
							<h2>Book Car</h2>
							<hr>
						</div>
						<div class="card">
						<form method="post" action="viewBook.php">
							<div class="card-block">
								<table class="table">
								  <tbody>
								    <tr>
								      <th scope="row">Car Registration Number</th>
								      <td>
								      	<?php echo $carID ?>
								      	<input type="hidden" name="carID" value="<?php echo $carID ?>">
								      	<input type="hidden" name="userID" value="<?php echo $_SESSION['id'] ?>">
								      </td>
								    </tr>
								    <tr>
								      <th scope="row">Date</th>
								      <td>
								      	<?php echo date("d/m/Y"); ?>
								      	<input type="hidden" name="date" value="<?php echo date("d/m/Y") ?>">
								      </td>
								    </tr>
								    <tr>
								      <th scope="row">Time</th>
								      <td>
								      	<div class="row">
								      		<div class="col-4">
								      			<select class="custom-select form-control" name="hourStart">
								      				<option value="01">01</option>
								      				<option value="02">02</option>
								      				<option value="03">03</option>
								      				<option value="04">04</option>
								      				<option value="05">05</option>
								      				<option value="06">06</option>
								      				<option value="07">07</option>
								      				<option value="08">08</option>
								      				<option value="09">09</option>
								      				<option value="10">10</option>
								      				<option value="11">11</option>
								      				<option value="12">12</option>
								      			</select>
								      		</div>
								      		<div class="col-4">
								      			<div class="input-group">
								  					<span class="input-group-addon">:</span>
									      			<select class="custom-select form-control" name="minStart">
									      				<option value="00">00</option>
									      				<option value="01">01</option>
									      				<option value="02">02</option>
									      				<option value="03">03</option>
									      				<option value="04">04</option>
									      				<option value="05">05</option>
									      				<option value="06">06</option>
									      				<option value="07">07</option>
									      				<option value="08">08</option>
									      				<option value="09">09</option>
									      				<option value="10">10</option>
									      				<option value="11">11</option>
									      				<option value="13">13</option>
									      				<option value="14">14</option>
									      				<option value="15">15</option>
									      				<option value="16">16</option>
									      				<option value="17">17</option>
									      				<option value="18">18</option>
									      				<option value="19">19</option>
									      				<option value="20">20</option>
									      				<option value="21">21</option>
									      				<option value="22">22</option>
									      				<option value="23">23</option>
									      				<option value="24">24</option>
									      				<option value="25">25</option>
									      				<option value="26">26</option>
									      				<option value="27">27</option>
									      				<option value="28">28</option>
									      				<option value="29">29</option>
									      				<option value="30">30</option>
									      				<option value="31">31</option>
									      				<option value="32">32</option>
									      				<option value="33">33</option>
									      				<option value="34">34</option>
									      				<option value="35">35</option>
									      				<option value="36">36</option>
									      				<option value="37">37</option>
									      				<option value="38">38</option>
									      				<option value="39">39</option>
									      				<option value="40">40</option>
									      				<option value="41">41</option>
									      				<option value="42">42</option>
									      				<option value="43">43</option>
									      				<option value="44">44</option>
									      				<option value="45">45</option>
									      				<option value="46">46</option>
									      				<option value="47">47</option>
									      				<option value="48">48</option>
									      				<option value="49">49</option>
									      				<option value="50">50</option>
									      				<option value="51">51</option>
									      				<option value="52">52</option>
									      				<option value="53">53</option>
									      				<option value="54">54</option>
									      				<option value="55">55</option>
									      				<option value="56">56</option>
									      				<option value="57">57</option>
									      				<option value="58">58</option>
									      				<option value="59">59</option>
									      				<option value="60">60</option>
									      			</select>
									      		</div>
								      		</div>
								      		<div class="col-4">
								      			<select class="custom-select form-control" name="dayStart">
								      				<option value="AM">AM</option>
								      				<option value="PM">PM</option>
								      			</select>
								      		</div>
								      	</div>
								      </td>
								    </tr>
								    <tr>
								      <th scope="row">Delivery Method</th>
								      <td>
								      	<select class="custom-select form-control" name="delivery">
								      		<option value="Pick-up">Self Pickup</option>
								      		<option value="Delivery">Delivery</option>
								      	</select>
								      </td>
								    </tr>
								    <tr class="text-right">
								    	<td colspan="2">
								    		<input type="submit" name="bookCar" value="Book" class="btn btn-primary">
								    		<a href="index.php" class="btn btn-danger">Back</a>
								    	</td>
								    </tr>
								  </tbody>
								</table>
							</div>
						</form>
						</div>
					</div>
					<!-- End View -->

					<!-- Footer -->
					<?php include"footer.php"; ?>
					<!-- End Footer -->

				    <?php include"script.php"; ?>
				</body>

				</html>
			<?php
		}
		else
		{
			echo '<script>';
			echo 'alert("Please Sign In First");';
			echo 'location.href="signin.php";';
			echo '</script>';
		}
	}

	else if(isset($_POST["bookCar"]))
	{
		$carID = $_POST["carID"];
		$userID = $_POST["userID"];
		$date = $_POST["date"];
		$hour = $_POST["hourStart"];
		$dd = ":";
		$min = $_POST["minStart"];
		$space = " ";
		$day = $_POST["dayStart"];
		$delivery = $_POST["delivery"];

		$sql0 = "INSERT INTO rental VALUES ('', '". $date ."', '". $hour . $dd . $min . $space . $day ."', '', '". $userID ."', '". $carID ."', 'Submitted', '". $delivery ."', '')";
		$query0 = mysqli_query($dbconn, $sql0);

		$sql1 = "SELECT * FROM user WHERE userID = '$userID'";
		$query1 = mysqli_query($dbconn, $sql1);
		$data1 = mysqli_fetch_assoc($query1);
		
		// Mailer Customer
		require 'custom/PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();                     // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'delimatechteam@gmail.com';          // SMTP username
		$mail->Password = 'delima2016'; // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                 // TCP port to connect to
		$mail->setFrom('delimatechteam@gmail.com', 'Die Garage');
		$mail->addReplyTo('delimatechteam@gmail.com', 'Die Garage');
		$mail->addAddress($data1["userEmail"]);   // Add recipient(s)
		$mail->isHTML(true);  // Set email format to HTML
		$bodyContent = '<b>Die Garage Online Car Renting</b><br><br>';
		$bodyContent .=  'Dear ';
		$bodyContent .=  $data1["userFirstName"].PHP_EOL;
		$bodyContent .=  '<br><br>';
		$bodyContent .= "Hi there! Thank you for booking with us. Please wait the approval from the owner. <br>We will notify you when the status as soon as possible.";
		$mail->Subject = 'Car Booking and Approval';
		$mail->Body    = $bodyContent;

		// End Mailer Customer

		$sql2 = "SELECT * FROM user u JOIN car c ON u.userID = c.userID 
				 WHERE carID = '$carID'";
		$query2 = mysqli_query($dbconn, $sql2);
		$data2 = mysqli_fetch_assoc($query2);

		// Mailer Owner
		//require 'custom/PHPMailer/PHPMailerAutoload.php';
		$mail2 = new PHPMailer;
		$mail2->isSMTP();                     // Set mailer to use SMTP
		$mail2->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail2->SMTPAuth = true;                            // Enable SMTP authentication
		$mail2->Username = 'delimatechteam@gmail.com';          // SMTP username
		$mail2->Password = 'delima2016'; // SMTP password
		$mail2->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail2->Port = 587;                                 // TCP port to connect to
		$mail2->setFrom('delimatechteam@gmail.com', 'Die Garage');
		$mail2->addReplyTo('delimatechteam@gmail.com', 'Die Garage');
		$mail2->addAddress($data1["userEmail"]);   // Add recipient(s)
		$mail2->isHTML(true);  // Set email format to HTML
		$bodyContent = '<b>Die Garage Online Car Renting</b><br><br>';
		$bodyContent .=  'Dear ';
		$bodyContent .=  $data2["userFirstName"].PHP_EOL;
		$bodyContent .=  '<br><br>';
		$bodyContent .= "You got one booking request. Below are the details of the customer and booking.<br>" . "Name: " . $data1["userFirstName"] . "<br>Car Registration Number: " . $carID . "<br>Car Brand/ Model: " . $data2["carManufacturer"] . "/ " . $data2["carModelName"] . "<br>Date: " . $date . "<br>Time: " . $hour . $dd . $min . $space . $day . "<br><br> Please login to your account for further action. <br>Thank You.";
		$mail2->Subject = 'Booking Notification';
		$mail2->Body    = $bodyContent;

	// End Mailer Owner
		if(!$mail->send() || !$mail2->send()) 
		{
			//echo 'Failed. Email could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;

			echo '<script>';
			echo 'alert("Booking Error. Please Try Again");';
			echo 'location.href="manageReservation.php";';
			echo '</script>';
		} 
		else 
		{
		// echo 'Message has been sent. ';
			echo '<script>';
			echo 'alert("Please A Moment For Confirmation From The Owner. Thank You");';
			echo 'location.href="manageReservation.php";';
			echo '</script>';
		}

		
	}

	else if(isset($_POST["cancelReservation"]))
	{
		$rentalID = $_POST["rentalID"];

		$sql1 = "SELECT * FROM rental r JOIN car c on r.carID = c.carID
				 JOIN user u ON r.renterID = u.userID
				 WHERE r.rentalID = '$rentalID'";
		$query1 = mysqli_query($dbconn, $sql1);
		$data1 = mysqli_fetch_assoc($query1);

		$sql3 = "SELECT * FROM user 
				 WHERE userID = '$data1[renterID]'";
		$query3 = mysqli_query($dbconn, $sql3);
		$data3 = mysqli_fetch_assoc($query3);

		// Mailer Customer
		require 'custom/PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();                     // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'delimatechteam@gmail.com';          // SMTP username
		$mail->Password = 'delima2016'; // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                 // TCP port to connect to
		$mail->setFrom('delimatechteam@gmail.com', 'Die Garage');
		$mail->addReplyTo('delimatechteam@gmail.com', 'Die Garage');
		$mail->addAddress($data1["userEmail"]);   // Add recipient(s)
		$mail->isHTML(true);  // Set email format to HTML
		$bodyContent = '<b>Die Garage Online Car Renting</b><br><br>';
		$bodyContent .=  'Dear ';
		$bodyContent .=  $data1["userFirstName"].PHP_EOL;
		$bodyContent .=  '<br><br>';
		$bodyContent .= "Hi there! You have cancel your car booking (" . $data1["carManufacturer"] . "/ " . $data1["carModelName"] . "/" . $data1["carID"] . ")". ".<br>Thank You.";
		$mail->Subject = 'Car Booking Cancellation';
		$mail->Body    = $bodyContent;

		// End Mailer Customer

		$sql2 = "SELECT * FROM user u JOIN car c ON u.userID = c.userID 
				 WHERE carID = '$data1[carID]'";
		$query2 = mysqli_query($dbconn, $sql2);
		$data2 = mysqli_fetch_assoc($query2);

		// Mailer Owner
		//require 'custom/PHPMailer/PHPMailerAutoload.php';
		$mail2 = new PHPMailer;
		$mail2->isSMTP();                     // Set mailer to use SMTP
		$mail2->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail2->SMTPAuth = true;                            // Enable SMTP authentication
		$mail2->Username = 'delimatechteam@gmail.com';          // SMTP username
		$mail2->Password = 'delima2016'; // SMTP password
		$mail2->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail2->Port = 587;                                 // TCP port to connect to
		$mail2->setFrom('delimatechteam@gmail.com', 'Die Garage');
		$mail2->addReplyTo('delimatechteam@gmail.com', 'Die Garage');
		$mail2->addAddress($data2["userEmail"]);   // Add recipient(s)
		$mail2->isHTML(true);  // Set email format to HTML
		$bodyContent = '<b>Die Garage Online Car Renting</b><br><br>';
		$bodyContent .=  'Dear ';
		$bodyContent .=  $data2["userFirstName"].PHP_EOL;
		$bodyContent .=  '<br><br>';
		$bodyContent .= "Hi! " . $data1["userFirstName"] . " has cancel the booking on ". $data1["carManufacturer"] . " " . $data1["carModelName"] . "-" . $data1["carID"] . ". <br>Thank You.";
		$mail2->Subject = 'Booking Cancellation Notification';
		$mail2->Body    = $bodyContent;

	// End Mailer Owner

		if(!$mail->send() || !$mail2->send()) 
		{
			echo 'Failed. Email could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

			echo '<script>';
			echo 'alert("Booking Cancel Error. Please Try Again");';
			//echo 'location.href="manageReservation.php";';
			echo '</script>';
		} 
		else 
		{
		// echo 'Message has been sent. ';
			$sql0 = "DELETE FROM rental WHERE rentalID = '$rentalID'";
			$query0 = mysqli_query($dbconn, $sql0);

			echo '<script>';
			echo 'alert("The Booking Has Been Cancel");';
			echo 'location.href="manageReservation.php";';
			echo '</script>';	
		}
		
	}

	else if(isset($_POST["bookingStatus"]))
	{
		$rentalID = $_POST["rentalID"];

		$sql1 = "SELECT * FROM rental WHERE rentalID = '$rentalID'";
		$query1 = mysqli_query($dbconn, $sql1);

		$data1 = mysqli_fetch_assoc($query1);

		?>
			<!DOCTYPE html>
				<html lang="en">

				<head>
				    <?php include"head.php"; ?>
				    <title>Update Booking Status - Online Car Rental</title>
				</head>

				<body>
					<!-- Navbar -->
					<?php include "navbar.php"; ?>
					<!-- End Navbar -->

					<!-- View -->
					<br>
					<div class="container">
						<div class="header-title">
							<h2>Book Car Status</h2>
							<hr>
						</div>
						<div class="card">
						<form method="post" action="viewBook.php">
							<div class="card-block">
								<table class="table">
								  <tbody>
								    <tr>
								      <th scope="row">Car Registration Number</th>
								      <td>
								      	<?php echo $data1["carID"] ?>
								      	<input type="hidden" name="rentalID" value="<?php echo $rentalID ?>">
								      	<input type="hidden" name="carID" value="<?php echo $data1["carID"] ?>">
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Delivery</th>
								      <td>
								      	<?php echo $data1["rentalDelivery"] ?>
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Status</th>
								      <td>
								      	<select class="custom-select form-control" name="status">
								      		<option value="Approve">Approve</option>
								      		<option value="Reject">Reject</option>
								      	</select>
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Note</th>
								      <td>
								      	<textarea class="form-control" name="note"></textarea>
								      </td>
								    </tr>
								    <tr>
								    	<td class="text-center" colspan="2">
								    		<input type="submit" name="submitStatus" value="Submit" class="btn btn-primary">
								    		<a href="trackReservation.php" class="btn btn-danger text-white">Back</a>
								    	</td>
								    </tr>
								  </tbody>
								</table>
							</div>
						</form>
						</div>
					</div>
					<!-- End View -->

					<!-- Footer -->
					<?php include"footer.php"; ?>
					<!-- End Footer -->

				    <?php include"script.php"; ?>
				</body>

				</html>
		<?php
	}

	else if(isset($_POST["submitStatus"]))
	{
		$sql2 = "SELECT * FROM rental r JOIN user u ON r.renterID = u.userID
				 WHERE r.rentalID = '$_POST[rentalID]'";
		$query2 = mysqli_query($dbconn, $sql2);
		$data2 = mysqli_fetch_assoc($query2);

		$sql3 = "SELECT * FROM user
				 WHERE userID = '$data2[renterID]'";
		$query3 = mysqli_query($dbconn, $sql3);
		$data3 = mysqli_fetch_assoc($query3);

		$sql4 = "SELECT * FROM car
				 WHERE carID = '$data2[carID]'";
		$query4 = mysqli_query($dbconn, $sql4);
		$data4 = mysqli_fetch_assoc($query4);

		require 'custom/PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();                     // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'delimatechteam@gmail.com';          // SMTP username
		$mail->Password = 'delima2016'; // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                 // TCP port to connect to
		$mail->setFrom('delimatechteam@gmail.com', 'Die Garage');
		$mail->addReplyTo('delimatechteam@gmail.com', 'Die Garage');
		$mail->addAddress($data3["userEmail"]);   // Add recipient(s)
		$mail->isHTML(true);  // Set email format to HTML
		$bodyContent = '<b>Die Garage Online Car Renting</b><br><br>';
		$bodyContent .=  'Dear ';
		$bodyContent .=  $data3["userFirstName"].PHP_EOL;
		$bodyContent .=  '<br><br>';
		$bodyContent .= "Hi there! Your booking (" . $data4["carManufacturer"] . "/ " . $data4["carModelName"] . "/" . $data2["carID"] . ")". " has been approved. Please sign in into your account for more information. <br>Thank You.";
		$mail->Subject = 'Car Booking Confirmation';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) 
		{
			//echo 'Failed. Email could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;

			echo '<script>';
			echo 'alert("Booking Update Error. Please Try Again");';
			//echo 'location.href="manageReservation.php";';
			echo '</script>';
		} 
		else 
		{
		// echo 'Message has been sent. ';
			$sql0 = "UPDATE rental 
				 SET rentalStatus ='$_POST[status]', rentalNote = '$_POST[note]' 
				 WHERE rentalID = '$_POST[rentalID]'";
			$query0 = mysqli_query($dbconn, $sql0);

			$sql1 = "UPDATE car 
					 SET carStatus ='Not Available' 
					 WHERE carID = '$_POST[carID]'";
			$query1 = mysqli_query($dbconn, $sql1);

			if ($query0 && $query1) 
			{
				echo '<script>';
				echo 'alert("The Booking Updated");';
				echo 'location.href="trackReservation.php";';
				echo '</script>';
			}	
		}
	}
	else if(isset($_POST["viewRental"]))
	{
		$rentalID = $_POST["rentalID"];

		$sql2 = "SELECT * FROM rental r JOIN car c ON r.carID = c.carID
				 JOIN user u ON c.userID = u.userID
				 JOIN address a ON u.userID = a.userID
				 WHERE rentalID = '$rentalID'";
		$query2 = mysqli_query($dbconn, $sql2);

		$data2 = mysqli_fetch_assoc($query2);

		?>
		<!DOCTYPE html>
				<html lang="en">

				<head>
				    <?php include"head.php"; ?>
				    <title>View Booking - Online Car Rental</title>
				</head>

				<body>
					<!-- Navbar -->
					<?php include "navbar.php"; ?>
					<!-- End Navbar -->

					<!-- View -->
					<br>
					<div class="container">
						<div class="header-title">
							<h2>Book Car View</h2>
							<hr>
						</div>
						<div class="card">
							<div class="card-block">
								<table class="table">
								  <tbody>
								    <tr>
								      <th scope="row">Car Registration Number</th>
								      <td>
								      	<?php echo $data2["carID"] ?>
								      	<input type="hidden" name="rentalID" value="<?php echo $rentalID ?>">
								      	<input type="hidden" name="carID" value="<?php echo $data2["carID"] ?>">
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Car Owner</th>
								      <td><?php echo $data2["userFirstName"] . $data2["userLastName"] ?></td>
								    </tr>
								    <tr>
								    <th scope="row">Address</th>
								      <td><?php echo $data2["addressLine1"] . "<br>" . $data2["addressLine2"] . "<br>" . $data2["addressCity"] . "<br>" . $data2["addressState"] ?></td>
								    </tr>
								    <tr>
								    <th scope="row">Car Brand/ Model</th>
								      <td><?php echo $data2["carManufacturer"] . "/ " . $data2["carModelName"] ?></td>
								    </tr>
								    <tr>
								    <th scope="row">Transimssion/ Car Capacity/ Fuel</th>
								      <td><?php echo $data2["carTransmission"] . "/ " . $data2["carCapacity"] . " Persons/" . $data2["carFuel"]?></td>
								    </tr>
								    <tr>
								    <th scope="row">Rental Date</th>
								      <td><?php echo $data2["rentalDate"] ?></td>
								    </tr>
								    <tr>
								    <th scope="row">Start/ End Time</th>
								      <td>
								      	<?php echo $data2["rentalStart"] . "/ " . $data2["rentalEnd"]?>
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Delivery Option</th>
								      <td>
								      	<?php echo $data2["rentalDelivery"]?>
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Note</th>
								      <td>
								      	<?php echo $data2["rentalNote"]?>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- End View -->

					<!-- Footer -->
					<?php include"footer.php"; ?>
					<!-- End Footer -->

				    <?php include"script.php"; ?>
				</body>

				</html>
		<?php
	}

	else if(isset($_POST["payment"]))
	{
		$rentalID = $_POST["rentalID"];

		$sql3 = "SELECT * FROM rental r JOIN car c ON r.carID = c.carID
				 JOIN user u ON c.userID = u.userID
				 JOIN address a ON u.userID = a.userID
				 WHERE rentalID = '$rentalID'";
		$query3 = mysqli_query($dbconn, $sql3);

		$data3 = mysqli_fetch_assoc($query3);

		$sql4 = "SELECT * FROM user WHERE userID = '$data3[renterID]'";
		$query4 = mysqli_query($dbconn, $sql4);
		$data4 = mysqli_fetch_assoc($query4);

		$sql5 = "SELECT * FROM service WHERE serviceID = '$data3[carServiceID]'";
		$query5 = mysqli_query($dbconn, $sql5);
		$data5 = mysqli_fetch_assoc($query5);
		?>
		<!DOCTYPE html>
				<html lang="en">

				<head>
				    <?php include"head.php"; ?>
				    <title>Payment - Online Car Rental</title>
				</head>

				<body>
					<!-- Navbar -->
					<?php include "navbar.php"; ?>
					<!-- End Navbar -->

					<!-- View -->
					<br>
					<div class="container">
						<div class="header-title">
							<h2>Payment</h2>
							<hr>
						</div>
						<div class="card">
							<div class="card-block">
								<form method="post" action="viewBook.php">
								<table class="table">
								  <tbody>
								    <tr>
								      <th scope="row">Car Registration Number</th>
								      <td>
								      	<?php echo $data3["carID"] ?>
								      	<input type="hidden" name="rentalID" value="<?php echo $rentalID ?>">
								      	<input type="hidden" name="carID" value="<?php echo $data3["carID"] ?>">
								      	<input type="hidden" id="rate1" value="<?php echo $data5["serviceFirstHourRate"] ?>">
								      	<input type="hidden" id="rate2" value="<?php echo $data5["serviceNextRate"] ?>">
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Renter Name</th>
								      <td>
								      	<?php echo $data4["userFirstName"] . " " . $data4["userLastName"] ?>
								      	<input type="hidden" name="name" value="<?php echo $data4["userFirstName"] . " " . $data4["userLastName"] ?>">
								      	<input type="hidden" name="renterID" value="<?php echo $data3['renterID']?>" >
								      	<input type="hidden" name="ownerName" value="<?php echo $data3["userFirstName"] . " " . $data3["userLastName"] ?>">
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Renter Email</th>
								      <td>
								      	<?php echo $data4["userEmail"] ?>
										<input type="hidden" name="email" value="<?php echo $data4["userEmail"] ?>">
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Car Brand/ Model</th>
								      <td><?php echo $data3["carManufacturer"] . "/ " . $data3["carModelName"] ?></td>
								    </tr>
								    <tr>
								    <th scope="row">Rental Date</th>
								      <td>
								      	<?php echo $data3["rentalDate"] ?>
								      	<input type="hidden" name="startDate" id="startDate" value="<?php echo $data3["rentalDate"] ?>">
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Payment Date</th>
								      <td>
								      	<?php echo date("d/m/Y"); ?>
								      	<input type="hidden" name="endDate" id="endDate" value="<?php echo date("d/m/Y") ?>">
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Start Time</th>
								      <td>
								      	<?php echo $data3["rentalStart"]?>
								      	<input type="hidden" name="startTime" id="startTime" value="<?php echo $data3["rentalStart"]?>">
								      </td>
								    </tr>
								    <tr>
								      <th scope="row">End Time</th>
								      <td>
								      	<div class="row">
								      		<div class="col-4">
								      			<select class="custom-select form-control" name="hourEnd" id="hourEnd">
								      				<option value="01">01</option>
								      				<option value="02">02</option>
								      				<option value="03">03</option>
								      				<option value="04">04</option>
								      				<option value="05">05</option>
								      				<option value="06">06</option>
								      				<option value="07">07</option>
								      				<option value="08">08</option>
								      				<option value="09">09</option>
								      				<option value="10">10</option>
								      				<option value="11">11</option>
								      				<option value="12">12</option>
								      			</select>
								      		</div>
								      		<div class="col-4">
								      			<div class="input-group">
								  					<span class="input-group-addon">:</span>
									      			<select class="custom-select form-control" name="minEnd" id="minEnd">
									      				<option value="00">00</option>
									      				<option value="01">01</option>
									      				<option value="02">02</option>
									      				<option value="03">03</option>
									      				<option value="04">04</option>
									      				<option value="05">05</option>
									      				<option value="06">06</option>
									      				<option value="07">07</option>
									      				<option value="08">08</option>
									      				<option value="09">09</option>
									      				<option value="10">10</option>
									      				<option value="11">11</option>
									      				<option value="13">13</option>
									      				<option value="14">14</option>
									      				<option value="15">15</option>
									      				<option value="16">16</option>
									      				<option value="17">17</option>
									      				<option value="18">18</option>
									      				<option value="19">19</option>
									      				<option value="20">20</option>
									      				<option value="21">21</option>
									      				<option value="22">22</option>
									      				<option value="23">23</option>
									      				<option value="24">24</option>
									      				<option value="25">25</option>
									      				<option value="26">26</option>
									      				<option value="27">27</option>
									      				<option value="28">28</option>
									      				<option value="29">29</option>
									      				<option value="30">30</option>
									      				<option value="31">31</option>
									      				<option value="32">32</option>
									      				<option value="33">33</option>
									      				<option value="34">34</option>
									      				<option value="35">35</option>
									      				<option value="36">36</option>
									      				<option value="37">37</option>
									      				<option value="38">38</option>
									      				<option value="39">39</option>
									      				<option value="40">40</option>
									      				<option value="41">41</option>
									      				<option value="42">42</option>
									      				<option value="43">43</option>
									      				<option value="44">44</option>
									      				<option value="45">45</option>
									      				<option value="46">46</option>
									      				<option value="47">47</option>
									      				<option value="48">48</option>
									      				<option value="49">49</option>
									      				<option value="50">50</option>
									      				<option value="51">51</option>
									      				<option value="52">52</option>
									      				<option value="53">53</option>
									      				<option value="54">54</option>
									      				<option value="55">55</option>
									      				<option value="56">56</option>
									      				<option value="57">57</option>
									      				<option value="58">58</option>
									      				<option value="59">59</option>
									      			</select>
									      		</div>
								      		</div>
								      		<div class="col-2">
								      			<select class="custom-select form-control" name="dayEnd" id="dayEnd">
								      				<option value="AM">AM</option>
								      				<option value="PM">PM</option>
								      			</select>
								      		</div>
								      		<div class="col-2">
								      			<button type="button" class="btn btn-success" id="btnCal">Calculate</button>
								      		</div>
								      	</div>
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Rental Fee</th>
								      <td>
								      	<div class="input-group">
								      		<span class="input-group-addon">RM</span>
								      		<input type="text" name="paymentTotal" id="paymentTotal" class="form-control" readonly>
								      	</div>
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Note</th>
								      <td>
								      	<textarea class="form-control"  name="note" id="note"><?php echo $data3["rentalNote"]?></textarea>
								      </td>
								    </tr>
								    <tr>
								    <th scope="row">Rate This Renter</th>
								      <td>
								      	<div id="stars-green" data-rating="0"></div>
								      	<input type="hidden" name="rateCount" id="rateCount">
								      </td>
								    </tr>
								    <tr>
								    	<td colspan="2" class="text-right">
								    		<input type="submit" name="payFee" class="btn btn-primary" value="Pay">
								    		<a class="btn btn-danger" href="trackReservation.php">Back</a>
								    	</td>
								    </tr>
								  </tbody>
								</table>
								</form>
							</div>
						</div>
					</div>
					<!-- End View -->


					<!-- Footer -->
					<?php include"footer.php"; ?>
					<!-- End Footer -->


				    <?php include"script.php"; ?>

					<script>

						$(document).ready(function()
						{
							$("#btnCal").click(function()
							{

								var startTime = $("#startTime").val();
								var hrEnd = parseInt($("#hourEnd").val());
								var minEnd = $("#minEnd").val();
								var dayEnd = $("#dayEnd").val();

								var hrStart = parseInt(startTime.substring(0,2));
								var minStart = startTime.substring(3,5);
								var dayStart = startTime.substring(6,8);

								if(dayStart == "PM")
								{
									hourStart = hrStart + 12;
								}
								else
								{
									hourStart = hrStart;
								}

								if(dayEnd == "PM")
								{
									hourEnd = hrEnd + 12;
								}
								else
								{
									hourEnd = hrEnd;
								}


								var start = $("#startDate").val().split("/");

								var end = $("#endDate").val().split("/");

								start = new Date(start[2], start[1]-1, start[0],hourStart, minStart);
								end = new Date(end[2], end[1]-1, end[0], hourEnd, minEnd);

								var diff = end - start;
								var diffSeconds = diff/1000;
							    var HH = Math.floor(diffSeconds/3600);
							    var MM = Math.floor(diffSeconds%3600)/60;
							    var total, difRate2, rate1, rate2;

							    rate1 = parseFloat($("#rate1").val());
							    rate2 = parseFloat($("#rate2").val());

							    var hourFinal = ((HH < 10)?("0" + HH):HH);
							    var minFinal = ((MM < 10)?("0" + MM):MM);

							   if(hourFinal < 1)
							    {
							    	total = rate1.toFixed(2);
							    }
							    else
							    {
							    	difRate2 = rate2/60;
							    	total = (rate1 + ((hourFinal-1)*rate2) + (minFinal * difRate2)).toFixed(2);

							    }

								$("#paymentTotal").val(total);
								
							})
						});

				    </script>
				    <script type="text/javascript" src="js/rating.js"></script>
				</body>

				</html>
		<?php
	}

	else if(isset($_POST["payFee"]))
	{
		$rentalID = $_POST["rentalID"];
		$renterID = $_POST["renterID"];
		$carID = $_POST["carID"];
		$renterName = $_POST["name"];
		$ownerName = $_POST["ownerName"];
		$renterEmail = $_POST["email"];
		$renterDate = $_POST["startDate"];
		$paymentDate = $_POST["endDate"];
		$renterStart = $_POST["startTime"];
		$hour = $_POST["hourEnd"] . ":" . $_POST["minEnd"] . " " . $_POST["dayEnd"];
		$renterPayment = $_POST["paymentTotal"];
		$renterNote = $_POST["note"];

		$rate = $_POST["rateCount"];

		require 'custom/PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();                     // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'delimatechteam@gmail.com';          // SMTP username
		$mail->Password = 'delima2016'; // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                 // TCP port to connect to
		$mail->setFrom('delimatechteam@gmail.com', 'Die Garage');
		$mail->addReplyTo('delimatechteam@gmail.com', 'Die Garage');
		$mail->addAddress($renterEmail);   // Add recipient(s)
		$mail->isHTML(true);  // Set email format to HTML
		$bodyContent = '<b>Die Garage Online Car Renting</b><br><br>';
		$bodyContent .=  'Dear ';
		$bodyContent .=  $renterName.PHP_EOL;
		$bodyContent .=  '<br><br>';
		$bodyContent .= "Payment Details: <br>Payment to: " . $ownerName . "<br>Date: " . $paymentDate . "<br>Time: " . $hour . "<br>Payment : RM " . $renterPayment . "<br>Payment Status: Success<br><br>Thank You for renting with us.";
		$mail->Subject = 'Rental Payment';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) 
		{
			echo 'Failed. Email could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

			echo '<script>';
			echo 'alert("Payment Error. Please Try Again");';
			//echo 'location.href="manageReservation.php";';
			echo '</script>';
		} 
		else 
		{
		// echo 'Message has been sent. ';
			$sql0 = "INSERT INTO payment VALUES ('', '". $paymentDate ."', '". $renterEmail ."', '". $renterName ."', '". $ownerName ."', '". $renterPayment ."', '". $rentalID ."')";
			$query0 = mysqli_query($dbconn, $sql0);

			$sql1 = "UPDATE rental 
					 SET rentalEnd = '$hour', rentalStatus = 'Paid', rentalNote = '$renterNote'
					 WHERE rentalID = '$rentalID'";
			$query1 = mysqli_query($dbconn, $sql1);

			$sql2 = "INSERT INTO rating VALUES ('', '". $rate ."', '', '". $renterID ."')";
			$query2 = mysqli_query($dbconn, $sql2);

			if ($query0 && $query1 && $query2) 
			{
				echo '<script>';
				echo 'alert("Payment Success");';
				echo 'location.href="trackReservation.php";';
				echo '</script>';
			}
		}
	}

	else if(isset($_POST["rateCar"]))
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
		  <title>Rate Car Service - Online Car Rental</title>
		</head>

		<body>
			<!-- Navbar -->
			<?php include "navbarDashboard.php"; ?>
			<!-- End Navbar -->
			<br>
		  	<!-- Update Car Status Form -->
			<div class="container">
				<div class="title-header">
					<h2>Rate Car</h2>
					<hr>
				</div>
			</div>
			<form method="post" action="viewBook.php">
				<div class="container">
					<div class="card">
						<div class="card-block">
							<div class="form-group">
								<label for="rateCount">Rate</label>
								<div id="stars-green" data-rating="0"></div>
								<input type="hidden" name="rateCount" id="rateCount" value="">
								<input type="hidden" name="carID" value="<?php echo $carID ?>">
							</div>
							<div class="form-group">
								<input type="submit" name="ratingCar" class="btn btn-primary">
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
		  <script type="text/javascript" src="js/rating.js"></script>

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
	else if(isset($_POST["ratingCar"]))
	{
		$carID = $_POST["carID"];
		$renterID = $_SESSION["id"];
		$rate = $_POST["rateCount"];

		$sql1 = "SELECT userID FROM car WHERE carID = '$carID'";
		$query1 = mysqli_query($dbconn, $sql1);
		$data1 = mysqli_fetch_assoc($query1);

		$sql2 = "INSERT INTO rating VALUES ('', '". $rate ."', '". $carID ."', '". $data1["userID"] ."')";
		$query2 = mysqli_query($dbconn, $sql2);
		header("Location: manageReservation.php");
	}

	else
	{
		header("Location: index.php");
	}

?>