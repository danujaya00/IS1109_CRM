<?php session_start(); ?>
<?php require_once('./phpFunc/connection/connect.php'); ?>
<?php require_once('./phpFunc/functions/functions.php'); ?>

<?php

$errors = array();
$fname = '';
$lname = '';
$username = '';
$mobile = '';
$address = '';
$email = '';
$age = '';
$gender = '';

if (isset($_POST['submit'])) {

    $fname = $_POST['F_fname'];
    $lname = $_POST['F_lname'];
    $username = $_POST['F_username'];
    $mobile = $_POST['F_mobile'];
    $address = $_POST['F_address'];
    $email = $_POST['F_email'];
    $age = $_POST['F_age'];
    $gender = $_POST['F_gender'];

    // checking required fields
    $req_fields = array('F_fname', 'F_lname', 'F_mobile', 'F_username', 'F_address', 'F_email', 'F_age', 'F_gender');
    $errors = array_merge($errors, check_req_fields($req_fields));

    // checking max length
    $max_len_fields = array('F_fname' => 15, 'F_lname' => 15, 'f_suername' => 20, 'F_mobile' => 11, 'F_address' => 50, 'F_email' => 50, 'F_age' => 11, 'F_gender' => 6);
    $errors = array_merge($errors, check_max_len($max_len_fields));

    // checking email address
    if (!is_email($_POST['F_email'])) {
        $errors[] = 'Email address is invalid.';
    }

    if (empty($errors)) {
        // no errors found... adding new record

        $fname = mysqli_real_escape_string($connection, $_POST['F_fname']);
        $lname = mysqli_real_escape_string($connection, $_POST['F_lname']);
        $username = mysqli_real_escape_string($connection, $_POST['F_username']);
        $mobile = mysqli_real_escape_string($connection, $_POST['F_mobile']);
        $email = mysqli_real_escape_string($connection, $_POST['F_email']);
        $address = mysqli_real_escape_string($connection, $_POST['F_address']);
        $age = mysqli_real_escape_string($connection, $_POST['F_age']);
        $gender = mysqli_real_escape_string($connection, $_POST['F_gender']);



        $query = "INSERT INTO crm_customer ( fname, lname, username, mob, address, email, age, gender) VALUES('{$fname}', '{$lname}', '{$username}' , '{$mobile}', '{$address}', '{$email}', '{$age}', '{$gender}')";

        $result = mysqli_query($connection, $query);
        verify_query($result);

        if ($result) {
            echo "<script>alert('Customer Registered Successfully');</script>";
            echo "<script>window.location='./customerLogin.php' </script>";
        } else {
            echo "<script>alert('registration failed');</script>";
            echo "<script>window.location='./customerLogin.php'</script>";;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/loginStyles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>

    <div class="wrapper-customer-register">
        <?php

        if (!empty($errors)) {
            display_errors($errors);
        }

        ?>
        <form action="customerregister.php" method="post">
            <a style="background-color: white; " href="./index.php"><i style="font-size:xx-large; color:#ff4b2b; background-color:white;   " class="material-icons">keyboard_backspace</i></a>

            <h1>Register Yourself
            </h1>
            <br>
            <input type="text" name="F_fname" <?php echo 'value="' . $fname . '"'; ?> placeholder="First Name" required>

            <input type="text" name="F_lname" <?php echo 'value="' . $lname . '"'; ?> placeholder="Last Name" required>

            <input type="text" name="F_username"" 
                <?php echo 'value="' . $username . '"'; ?> 
                placeholder=" Username" required>

            <input type="text" name="F_mobile" <?php echo 'value="' . $mobile . '"'; ?> placeholder="Mobile Number" required pattern='^\+?\d{0,11}'>

            <input type="text" name="F_address" <?php echo 'value="' . $address . '"'; ?> placeholder="Address" required>

            <input type="email" name="F_email" <?php echo 'value="' . $email . '"'; ?> placeholder="Email" required>

            <input type="number" name="F_age" <?php echo 'value="' . $age . '"'; ?> placeholder="Age" required>
            <br>
            <div class="radio">
                <div class="row radio-button">
                    <div class="column radio-button">
                        Male&nbsp;&nbsp;<input type="radio" id="male" name="F_gender" value="Male"> </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="column radio-button">
                        Female&nbsp;&nbsp;<input type="radio" id="female" name="F_gender" value="Female" required></div>
                </div>
            </div>

            <br>
            <div class="btn"><button type="submit" name="submit">Register</button></div>

            <div class="foot-text" style="background-color:white">
                <h3>Already Registered? <br>
                    <span><a href="./Login/logincustomer.php">Login now</a></span>    
                </h3>
            </div>
        </form>
    </div>
    </div>
</body>

</html>