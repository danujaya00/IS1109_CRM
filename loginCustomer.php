<?php session_start(); ?>
<?php require_once('./phpFunc/connection/connect.php'); ?>
<?php require_once('./phpFunc/functions/functions.php'); ?>
<?php

// check for form submission
if (isset($_POST['submit'])) {

    $errors = array();

    // to check username and mobile number are present in the form
    if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1) {
        $errors[] = 'Username is Missing / Invalid';
    }

    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $errors[] = 'Mobile Number is Missing / Invalid';
    }

    // to check errors in the form
    if (empty($errors)) {

        $username         = mysqli_real_escape_string($connection, $_POST['username']);
        $password     = mysqli_real_escape_string($connection, $_POST['password']);


        //query to check if the user is in the database

        $query = "SELECT * FROM crm_customer 
						WHERE username = '{$username}' 
						AND mob = '{$password}' 
						LIMIT 1";

        $result_set = mysqli_query($connection, $query);

        verify_query($result_set);

        if (mysqli_num_rows($result_set) == 1) {

            // user found
            $customer = mysqli_fetch_assoc($result_set);
            $_SESSION['name'] = $customer['fname'];
            $_SESSION['c_id'] = $customer['customer_id'];
            $_SESSION['email'] = $customer['email'];
            $_SESSION['roles'] = 'customer';
            $result_set = mysqli_query($connection, $query);

            verify_query($result_set);

            // redirect to admin.php
            header('Location: custViewUserDetails.php');
        } else {
            $errors[] = 'Invalid Username / MobileNo';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiZzA - Customer Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <link rel="stylesheet" href="./styles/customerstyles.css"> -->
    <link rel="stylesheet" href="./styles/loginstyles.css">
</head>

<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">

		<form action="loginCustomer.php" method="post">
		<a style="background-color: white; " href="./index.php"><i style="font-size:xx-large; color:#ff4b2b; background-color:white;   " class="material-icons">keyboard_backspace</i></a>
				<h1>Customer Login</h1>
				<br>
				<span>Use the registered email and password to login.</span>
				<br>
            <?php
            if (isset($errors)) {
                echo '<p class="warning-messege">Invalid Username / Mobile Number</p>';
            }
            ?>

            <?php
            if (isset($_GET['logout'])) {
                echo '<p class="info">You have successfully logged out from the system</p>';
            }
            ?>

                <input type="text" name="username" placeholder="Username" required>

                <input type="password" name="password" placeholder="Mobile Number" required>
            <br>
            <div class="btn"><button type="submit" name="submit">Log In</button></div>
            <br>
            <div class="foot-text" style="background-color:white">
                <h3>Not a Registered Customer? <br>
                    <a href="./customerregister.php">Register Now</a>
                </h3>
            </div>
        </form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<img  class="overlay-image" src="./assets/img/pizza-logo-image-ornage.png">
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<?php mysqli_close($connection); ?>