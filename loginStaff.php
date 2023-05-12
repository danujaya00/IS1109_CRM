<?php session_start(); ?>
<?php require_once('./phpFunc/connection/connect.php'); ?>
<?php require_once('./phpFunc/functions/functions.php'); ?>

<?php

// check for form submission
if (isset($_POST['logIn'])) {

	$errors = array();

	// to check username and password are present in the form
	if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1) {
		$errors[] = 'Email is Missing / Invalid';
	}

	if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
		$errors[] = 'Password is Missing / Invalid';
	}

	// to check errors in the form
	if (empty($errors)) {

		$email 		= mysqli_real_escape_string($connection, $_POST['username']);
		$password 	= mysqli_real_escape_string($connection, $_POST['password']);
		$enc_password = sha1($password);


		//query to check if the user is in the database
		$query = "SELECT * FROM crm_users 
						WHERE email = '{$email}' 
						AND password = '{$enc_password}' 
						LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		verify_query($result_set);

		if (mysqli_num_rows($result_set) == 1) {

			// user found
			$user = mysqli_fetch_assoc($result_set);
			$_SESSION['id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['roles'] = $user['roles'];

			// update last login
			$query = "UPDATE crm_users SET lastLogin = NOW() ";
			$query .= "WHERE id = {$_SESSION['id']} LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);

			// redirect to admin.php and staffView.php
			if ($_SESSION["roles"] == 'salesman') {
				header('Location: ./staffView.php');
			} elseif (($_SESSION["roles"] == 'admin')) {
				header('Location: ./admin.php');
			}
		} else {
			// invalid login details
			$errors[] = 'Invalid Username / Password';
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="./styles/loginstyles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>PiZzA - Staff Login</title>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">

			<form action="loginStaff.php" method="post">
				<a style="background-color: white; " href="./index.php"><i style="font-size:xx-large; color:#ff4b2b; background-color:white;   " class="material-icons">keyboard_backspace</i></a>
				<h1>Staff Login</h1>	
				<br>
				<span>Use the registered email and password to login.</span>
				<br>
				<?php
				if (isset($errors)) {
					echo '<p class="error">Invalid Username / Password</p>';
				}
				?>

				<?php
				if (isset($_GET['logout'])) {
					echo '<p class="info">You have successfully logged out from the system</p>';
				}
				?>
				<input type="text" name="username" placeholder="Email" required/>
				<input type="password" name="password" placeholder="Password" required/>
				<br>
				<button type="submit" name="logIn">Log In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<img class="overlay-image" src="./assets/img/pizza-logo-image-ornage.png">
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<?php mysqli_close($connection); ?>