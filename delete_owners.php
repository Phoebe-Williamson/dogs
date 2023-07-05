<!DOCTYPE html>
<html>
<head>
	
    <title>Dog Groomer Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

	<?php
		include '../dogs_mysqli.php';
	
		$delete_owner = "DELETE FROM Owners WHERE OwnerID='$_GET[OwnerID]'";
		
	
		if(!mysqli_query($conn, $delete_owner)) {
			echo 'Not deleted';
		} else {
			echo 'Deleted';
		}
	header("refresh:2, url = dogs.php");
	
	?>	
