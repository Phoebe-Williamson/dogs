<!DOCTYPE html>
<html>
<head>
    <title>Dog Groomer Database</title>
	<h1>Dog Groomer Database</h1>
	<a href="update_dogs_and_owners.php"> Edit</a>
	<a href="add_dogs_and_owners.php"> Add</a>
	<a href="username_test.php"> login</a>
	<a href="process_logout.php"> logout</a>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php
	session_start();
        include '../dogs_mysqli.php';
    ?>
    
    <h1>Search</h1>
    <form method="post">
        <input type="text" name="search">
        <input type="submit" name="submit" value="Search" class="search_button">
    </form>

    <?php
        /* searches database to see if the input matches */
        if (isset($_POST['search'])) {
            $search = $_POST['search'];

            $search_query_name = "SELECT Name, Breed
                                  FROM Dogs
                                  WHERE Name LIKE '%$search%'
                                  OR Breed LIKE '%$search%'";

            $search_query_name_results = mysqli_query($conn, $search_query_name);

            $count = mysqli_num_rows($search_query_name_results);

            /* checks if there are any results from the search */
            if ($count == 0) {
                echo "There were no search results!";
            } else {
                /* prints search results */
                echo "Dog: <br>";
                while ($row = mysqli_fetch_array($search_query_name_results)) {
                    echo $row['Name'];
                    echo "<br>";
                    echo $row['Breed'];
                    echo "<br>";
                }
            }
        }

        /* updating the dogs */
        $update_dogs = "SELECT * FROM Dogs, Owners WHERE Dogs.OwnerID = Owners.OwnerID";
        $update_dogs_record = mysqli_query($conn, $update_dogs);

        /* updating the owners */
        $update_owners = "SELECT * FROM Owners";
        $update_owners_record = mysqli_query($conn, $update_owners);
    ?>    

    <h2>List of Dogs</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Breed</th>
            <th>Hair Type</th>
            <th>Owner first name</th>
        </tr>
        <?php
        // Fetch dogs data from database
        $sql = "SELECT Dogs.DogID, Dogs.Name, Dogs.Breed, Dogs.HairType, Owners.FirstName 
                FROM Dogs, Owners 
                WHERE Dogs.OwnerID = Owners.OwnerID";
        $result = $conn->query($sql);

        // Display dogs data in table rows
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["DogID"]."</td><td>".$row["Name"]."</td><td>".$row["Breed"]."</td><td>".$row["HairType"]."</td><td>".$row["FirstName"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No dogs found.</td></tr>";
        }
        ?>
    </table>

    <h2>List of Owners</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Email</th>
        </tr>
        <?php
		$owner_query = "SELECT * FROM Owners";
		$owner_result = mysqli_query($conn, $owner_query);
		
		$display_owner_query = "SELECT * FROM Owners";
		$display_owner_result = mysqli_query($conn, $owner_query);
        // Display owners data in table rows
        if ($display_owner_result->num_rows > 0) {
            while ($row = $display_owner_result->fetch_assoc()) {
                echo "<tr><td>".$row["OwnerID"]."</td><td>".$row["FirstName"]."</td><td>".$row["LastName"]."</td><td>".$row["PhoneNumber"]."</td><td>".$row["Address"]."</td><td>".$row["Email"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No owners found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>


