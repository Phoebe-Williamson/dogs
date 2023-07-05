<!DOCTYPE html>
<html>
<head>
    <title>Dog Groomer Database</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php
        include '../dogs_mysqli.php';

        $update_owners = "UPDATE Owners SET FirstName='" . $_POST['FirstName'] . "', LastName='" . $_POST['LastName'] . "', PhoneNumber='" . $_POST['PhoneNumber'] . "', Email='" . $_POST['Email'] . "', Address='" . 		$_POST['Address'] . "' WHERE OwnerID='" . $_POST['OwnerID'] . "'";
		echo $_POST['FirstName'];
		echo $_POST['LastName'];
		echo $_POST['PhoneNumber'];
		echo $_POST['Address'];
		echo $_POST['Email'];
		echo $_POST['OwnerID'];
		

        if (!mysqli_query($conn, $update_owners)) {
            echo 'Not updated';
        } else {
            echo 'Updated';
        }
        header("refresh:2, url = dogs.php");
    ?>
</body>
</html>




