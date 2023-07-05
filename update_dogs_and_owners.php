<!DOCTYPE html>
<html>
<head>
    <title>Dog Groomer Database</title>
	<h1>Edit dogs and owners</h1>
	<a href="dogs.php"> Home</a>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<h2>Update Dogs</h2>
		<table>
			<tr>
				<th>Dog name</th>
				<th>Breed</th>
				<th>Hair Type</th>
				<th>Owner name</th>
			</tr>
			<?php
			session_start();
			include '../dogs_mysqli.php';
			
			if((!isset($_SESSION['Logged_in'])) or $_SESSION['Logged_in'] !=1) {
				header("Location: error.php");
			}
			
			$username = $_SESSION['username'];
			echo $username;
			if(!$username){
				header("Location: error.php");
			}
			
			$user_rank_query = "SELECT * FROM users WHERE Username = '$username'";
			$user_rank_result = mysqli_query($conn, $user_rank_query);
			$user_rank_row = mysqli_fetch_assoc($user_rank_result);
			
			$user_rank = $user_rank_row['Rank']; //store the users rank as a variable
			echo $user_rank;
			$required_rank = "admin"; 
			
			if ($user_rank !== $required_rank) {
				header("Location: error.php");
			}
						
			
			/* updating the dogs */
        	$update_dogs = "SELECT * FROM Dogs, Owners WHERE Dogs.OwnerID = Owners.OwnerID";
        	$update_dogs_record = mysqli_query($conn, $update_dogs);
			
			/* updating the owners */
        	$update_owners = "SELECT * FROM Owners";
        	$update_owners_record = mysqli_query($conn, $update_owners);

			while ($row = mysqli_fetch_array($update_dogs_record)) {
				echo "<tr><form action='update.php' method='post'>";
				echo "<td><input type='text' name='Name' value='" . $row['Name'] . "'></td>";
				echo "<td><input type='text' name='Breed' value='" . $row['Breed'] . "'></td>";
				echo "<td><input type='text' name='HairType' value='" . $row['HairType'] . "'></td>";
				echo "<td>";
			?>	
				<select id="Owner" name="Owner">
				<!-- options -->
				<?php
				$owner_query = "SELECT * FROM Owners";
				$owner_result = mysqli_query($conn, $owner_query);

				while ($update_owner_record = mysqli_fetch_assoc($owner_result)) {
					$defaultOption = $row['OwnerID'];
					$optionId = $update_owner_record['OwnerID'];
					$optionName = $update_owner_record['FirstName']." ".$update_owner_record['LastName'];
					$isSelected = ($optionId == $defaultOption) ? 'selected' : '';

					echo "<option value='$optionId' $isSelected>$optionName</option>";

				}
				?>
				</select>
			<?php
				echo "</td>";
				echo "<input type='hidden' name='DogID' value='" . $row['DogID'] . "'>";
				echo "<td><input type='submit'></td>";
				echo "<td><a href='delete.php?DogID=" . $row['DogID'] . "'>Delete</a></td>";
				echo "</form></tr>";
			}
			?>
		</table>
	
	<h2>Update Owners</h2>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Phone number</th>
            <th>Address</th>
            <th>Email</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($update_owners_record)) {
            echo "<tr><form action='update_owners.php' method='post'>";
            echo "<td><input type='text' name='FirstName' value='" . $row['FirstName'] . "'></td>";
            echo "<td><input type='text' name='LastName' value='" . $row['LastName'] . "'></td>";
            echo "<td><input type='text' name='PhoneNumber' value='" . $row['PhoneNumber'] . "'></td>";
            echo "<td><input type='text' name='Address' value='" . $row['Address'] . "'></td>";
			echo "<td><input type='text' name='Email' value='" . $row['Email'] . "'></td>";
			echo "<td><Input type='hidden' name='OwnerID' value='" . $row['OwnerID']. "'></td>";
            echo "<td><input type='submit'></td>";
            echo "<td><a href='delete_owners.php?OwnerID=" . $row['OwnerID'] . "'>Delete</a></td>";
            echo "</form></tr>";
        }
        ?>
    </table>
