<!DOCTYPE html>
<html>
<head>
	
    <title>Dog Groomer Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

	<?php
		include '../dogs_mysqli.php';
	
		$delete_dog = "DELETE FROM Dogs WHERE DogID='$_GET[DogID]'";
		
	
		if(!mysqli_query($conn, $delete_dog)) {
			echo 'Not deleted';
		} else {
			echo 'Deleted';
		}
	header("refresh:2, url = dogs.php");
	
	?>	
