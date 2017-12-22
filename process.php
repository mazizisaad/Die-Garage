<?php
	include("dbconn.php");
	session_start();

	if(isset($_POST["signUp"]))
	{
		
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$idFront = $_POST["idFront"];
		$idMiddle = $_POST["idMiddle"];
		$idBack = $_POST["idBack"];
		$date = $_POST["date"];
		$month = $_POST["month"];
		$year = $_POST["year"];
		$slash = "/";
		$phone = $_POST["phone"];
		$emailAdd = $_POST["emailAdd"];
		$at = "@";
		$com = ".com";
		$emailProvider = $_POST["emailProvider"];
		$password = $_POST["password"];

		$addressLine1 = $_POST["addressLine1"];
		$addressLine2 = $_POST["addressLine2"];
		$addressPostcode = $_POST["addressPostcode"];
		$addressCity = $_POST["addressCity"];
		$addressState = $_POST["addressState"];

		$licenseNo = $_POST["licenseNo"];
		$licenseExpDate = $_POST["licenseExpDate"];

		$userCategory = $_POST["userCategory"];

		$encrypPass = crypt($password, "x5");

		$sql0 = "INSERT INTO user VALUES ('". $idFront . $idMiddle . $idBack ."', '". $firstName ."', '". $lastName ."', '". $date . $slash . $month . $slash . $year ."', '". $emailAdd . $at . $emailProvider . $com ."', '". $phone ."', '". $userCategory ."', '". $licenseNo ."')";
		$query0 = mysqli_query($dbconn, $sql0);

		$sql1 = "INSERT INTO password VALUES ('". $idFront . $idMiddle . $idBack ."', '". $emailAdd . $at . $emailProvider . $com ."', '". $encrypPass ."')";
		$query1 = mysqli_query($dbconn, $sql1);

		$sql2 = "INSERT INTO license VALUES ('". $licenseNo ."', '". $licenseExpDate ."')";
		$query2 = mysqli_query($dbconn, $sql2);

		$sql3 = "INSERT INTO profile VALUES ('', '', '". $idFront . $idMiddle . $idBack ."')";
		$query3 = mysqli_query($dbconn, $sql3);

		$sql4 = "INSERT INTO address VALUES ('', '". $addressLine1 ."', '". $addressLine2 ."', '". $addressCity ."', '". $addressPostcode ."', '". $addressState ."', '". $idFront . $idMiddle . $idBack ."')";
		$query4 = mysqli_query($dbconn, $sql4);

		if($query0 && $query1 && $query2 && $query3 && $query4)
		{
			header("Location: signIn.php");
		}
		else
		{
			header("Location: signUp.php");
		}
	}

	if(isset($_POST["signin"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];

		$comparePass = crypt($password, "x5");

		$sql0 = "SELECT * 
				 FROM password
				 WHERE userEmail = '$username'
				 AND userPassword = '$comparePass'";
		$query0 = mysqli_query($dbconn, $sql0);
		$row = mysqli_num_rows($query0);

		if($row == 0)
		{
			echo '<script>';
			echo 'alert("Invalid Username or Password!");';
			echo 'location.href="signin.php";';
			echo '</script>';
		}
		else
		{
			$login = mysqli_fetch_assoc($query0);
			$id = $login["userID"];
			$email = $login["userEmail"];

			$sql1 = "SELECT userFirstName, userCategory
					 FROM user
					 WHERE userID = '$id'";
			$query1 = mysqli_query($dbconn, $sql1);
			
			$data = mysqli_fetch_assoc($query1);
			$name = $data["userFirstName"];
			$category = $data["userCategory"];

			$_SESSION["id"] = $id;
			$_SESSION["email"] = $email;
			$_SESSION["name"] = $name;
			$_SESSION["category"] = $category;

			header("location: dashboard.php");
		}
	}

	if(isset($_POST["contact"]))
	{
		$userName = $_POST["userName"];
		$emailAdd = $_POST["emailAdd"];
		$emailProvider = $_POST["emailProvider"];
		$at = "@";
		$com = ".com";
		$userPhone = $_POST["userPhone"];
		$userComment = $_POST["userComment"];

		$sql0 = "INSERT INTO contact VALUES ('', '". $userName ."', '". $emailAdd . $at . $emailProvider . $com ."', '". $userPhone ."', '". $userComment ."')";
		$query0 = mysqli_query($dbconn, $sql0);

		if($query0)
		{
			echo '<script>';
			echo 'alert("Your Form is Submitted! You Will Be Entertained As Soon As Possible.");';
			echo 'location.href="contactUs.php";';
			echo '</script>';	
		}
		else
		{
			echo '<script>';
			echo 'alert("Your Form is Not Submitted! Please Try Again");';
			echo 'location.href="contactUs.php";';
			echo '</script>';	
		}
	}
?>