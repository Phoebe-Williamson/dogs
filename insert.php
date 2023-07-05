<!DOCTYPE html>
<html>
<head>
	
    <title>Dog Groomer Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

	<?php
		include '../dogs_mysqli.php';

		$Name = $_POST['Name'];
		$Breed = $_POST['Breed'];
		$HairType = $_POST['HairType'];
		$owner = $_POST['Owner'];

	
		$insert_dog = "INSERT INTO Dogs (Name, Breed, HairType, OwnerID) VALUES ('$Name', '$Breed', '$HairType', '$owner')";

		
	
		if(!mysqli_query($conn, $insert_dog)) {
			echo 'Not inserterd';
		} else {
			echo 'Inserterd';
		}
	header("refresh:2, url = dogs.php");
	
	
	?>	
