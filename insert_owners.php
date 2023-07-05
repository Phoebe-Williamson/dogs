<!DOCTYPE html>
<html>
<head>
	
    <title>Dog Groomer Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

	<?php
		include '../dogs_mysqli.php';

		$Fname = $_POST['FirstName'];
		$Lname = $_POST['LastName'];
		$PhoneNumber = $_POST['PhoneNumber'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
	echo $Fname;
	echo $Lname;
	echo $PhoneNumber;
	echo $Address;
	echo $Email;
	
		
		$insert_owner = "INSERT INTO Owners (FirstName, LastName, PhoneNumber, Address, Email) VALUES ('$Fname', '$Lname', '$PhoneNumber', '$Address', '$Email')";
	
		if(!mysqli_query($conn, $insert_owner)) {
			echo 'Not inserterd';
		} else {
			echo 'Inserterd';
		}
	header("refresh:2, url = dogs.php");
	
	
	
		
	
	?>	
