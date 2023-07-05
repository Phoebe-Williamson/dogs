<?php
session_start();
session_destroy();

echo "You have logged out";
header("Location: dogs.php");

?>
