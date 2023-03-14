<?php
session_start();
 
unset($_SESSION['c_id']);
unset($_SESSION["name"]);

 
// Redirect to the login page
header("location: ../../../index.php");
exit;
?>