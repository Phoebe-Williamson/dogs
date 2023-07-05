<?php
include '../dogs_mysqli.php';
session_start();

$user = trim($_POST['Username']);
$pass = trim($_POST['Password']);

$login_query = "SELECT Password FROM users WHERE Username = '". $user."'";
$login_result = mysqli_query($conn, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['Password'];

$verify = password_verify($pass, $hash);
if ($verify) {
	$_SESSION['Logged_in'] =1;
	$_SESSION['username'] = $user;
    header("Location: dogs.php");
} else {
    header("Location: username_test.php");
}
?>
