<!DOCTYPE html>
<html>
<head>
    <title>Dog Groomer Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

	<?php
		include '../dogs_mysqli.php';

		$update_dogs = "UPDATE Dogs SET Name='" . $_POST['Name'] . "', Breed='" . $_POST['Breed'] ."', OwnerID='". $_POST['Owner'] . "' WHERE DogID='" . $_POST['DogID'] . "'";
		
		if(!mysqli_query($conn, $update_dogs)) {
			echo 'Not updated';
		} else {
			echo 'Updated';
		}
	header("refresh:2, url = dogs.php");
	
	
	?>	
