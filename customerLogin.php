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
						WHERE fname = '{$username}' 
						AND mob = '{$password}' 
						LIMIT 1";

        $result_set = mysqli_query($connection, $query);

        verify_query($result_set);

        if (mysqli_num_rows($result_set) == 1) {

            // user found
            $username = mysqli_fetch_assoc($result_set);
            $_SESSION['lname'] = $user['lname'];
            $_SESSION['email'] = $user['email'];
            $result_set = mysqli_query($connection, $query);

            verify_query($result_set);

            // redirect to admin.php
            header('Location: customerView.php');
        } else {
            $errors[] = 'Invalid Username / MobileNo';
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/customerstyles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <div class="wrapper">
        <a style="background-color: white; " href="./index.php"><i style="font-size:xxx-large; background-color:white;   " class="material-icons">keyboard_backspace</i></a>
        <h1>Customer Login
        </h1>
        <form action="customerLogin.php" method="post">
            <?php
            if (isset($errors)) {
                echo '<p class="error">Invalid Username / Mobile Number</p>';
            }
            ?>

            <?php
            if (isset($_GET['logout'])) {
                echo '<p class="info">You have successfully logged out from the system</p>';
            }
            ?>
            <div class="input-box">
                <input type="text" name="username" placeholder="Enter your First Name" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Enter your Mobile Number" required>
            </div>
            <br>
            <div class="btn"><button type="submit" name="submit">Log In</button></div>
            <br>
            <div class="text" style="background-color:white">
                <h3>Not a Registered Customer? <br>
                    <a href="./customerregister.php">Register Now</a>
                </h3>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
<?php mysqli_close($connection); ?>