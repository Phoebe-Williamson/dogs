<!DOCTYPE html>
<html>
<head>
    <title>Dog Groomer Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

	<?php
		include '../dogs_mysqli.php';

		$Uname = $_POST['Username'];
		$Pass = $_POST['Password'];
		$Fname = $_POST['FirstName'];
		$Lname = $_POST['LastName'];
		$PhoneNumber = $_POST['PhoneNumber'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
	
		$bcrypt_password = password_hash($Pass, PASSWORD_BCRYPT);

		$insert_user = "INSERT INTO users (Username, Password) VALUES ('$Uname', '$bcrypt_password')";
		$insert_owner = "INSERT INTO Owners (FirstName, LastName, PhoneNumber, Address, Email) VALUES ('$Fname', '$Lname', '$PhoneNumber', '$Address', '$Email')";
		

		if(!mysqli_query($conn, $insert_user) AND !mysqli_query($conn, $insert_owner )) {
			echo 'Account not created';
		} else {
			echo 'Account Created';
		}
	header("refresh:2, url = username_test.php");
	
	
	?>	
