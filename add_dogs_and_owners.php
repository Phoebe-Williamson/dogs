<!DOCTYPE html>
<html>
<head>
    <title>Dog Groomer Database</title>
	<h1>add dogs and owners</h1>
	<a href="dogs.php"> Home</a>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	 <h2>Add Dog</h2>
    <form action="insert.php" method="post">
        Dog name: <input type="text" name="Name" placeholder='e.g. Max' required><br>
        Dog breed: <input type="text" name="Breed" placeholder='e.g. Labrador' required><br>
        Hair type: <input type="text" name="HairType" placeholder='e.g. Short' required><br>
        Owner name:
        <select id="Owner" name="Owner">
            <!-- options -->
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
			
			$all_owner_query = "SELECT * FROM Owners";
			$all_owner_result = mysqli_query($conn, $all_owner_query);
			
            while ($drop_down_all_owner_record = mysqli_fetch_assoc($all_owner_result)) {
                echo "<option value='". $drop_down_all_owner_record['OwnerID'] . "'>";
                echo $drop_down_all_owner_record['FirstName']." ". $drop_down_all_owner_record['LastName'];
                echo "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Insert">
    </form>

    <h2>Add Owner</h2>
    <form action="insert_owners.php" method="post">
        Owner first name: <input type="text" name="FirstName" placeholder='e.g. John' required><br>
        Owner last name: <input type="text" name="LastName" placeholder='e.g. Doe' required><br>
        Phone number: <input type='tel' name='PhoneNumber' placeholder='e.g. 1234567890' pattern='[0-9]{3}[0-9]{3}[0-9]{4}' required><br>
        Email address: <input type='email' id='email' name='Email' placeholder='e.g John.Doe@gmail.com' required><br>
        Home Address: <input type="text" name="Address" placeholder='e.g. 123 1st Street'><br>
        <input type="submit" value="Insert">
    </form>
	
