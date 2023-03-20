<?php require_once('./phpFunc/connection/connect.php'); 

session_start();

// if(!$_SESSION["name"]) {
//   echo "<script>alert('Please Login First');</script>";
//   echo "<script>window.location='./index.php'</script>";
// }

$customer_id = $_SESSION['c_id'];
 
#$username='Sales_manager_name'; # for test

$sql = "SELECT * FROM crm_customer WHERE customer_id = '{$customer_id}'";
mysqli_query($connection, $sql);
$result = mysqli_query($connection,$sql);

if($result){
//echo "Sucessfull";
}
else{
echo"failed";	
}
?>



<!DOCTYPE html>
<html>
 
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./styles/customer/main.css" rel="stylesheet">
        <title>Customer View</title>
        
</head>

<body>


<!-- header -->
<div>

<span class="wel-msg"><p>Welcome <span style="font-size:44px;"><?php echo $_SESSION["name"]; ?></span></p></span>

<!-- sub header -->

<span class="sub-head">Details</span> <div class="sub-line"></div>

<span><a href="./phpFunc/functions/customer/logout.php"><button class="log_out-button">LogOut</button> </a></span>


</div>

<!-- header over -->


<!--menu-->

<div class="menu">

<span class="menu-header">MENU</span>

        <span class="menu-item"><a href="./customerView.php">Your Details</a></span> <div class="menu-line"></div><br><br>
        <span class="menu-item"><a href="./customerViewSales.php">Purchase History</a></span> <div class="menu-line"></div>
</div>

<!-- menu over -->


<!-- user view table -->

<table border="0" class="table_dec">

<tr bgcolor="#404040"> 

<th>Customer ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Mobile</th>
<th>Address</th>
<th>E-mail</th>
<th>&nbsp;&nbsp;Age&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;Gender&nbsp;&nbsp;</th>
<th>Update</th>

</tr>
<?php
$row = mysqli_fetch_assoc($result);
    echo "
        <tr bgcolor='#373737'>
            <td>" . $row['customer_id'] . "</td>
            <td>" . $row['fname'] . "</td>
            <td>" . $row['lname'] . "</td>
            <td>" . $row['mob'] . "</td>
            <td>" . $row['address'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./phpFunc/functions/customer/update.php?customer_id=".$row['customer_id']."'><button class='edit-button' role='button'>Edit</button> </a>&nbsp;&nbsp;&nbsp;&nbsp;</td>

        </tr>";

?>

</table>

<!-- user view table over -->


<!-- script for get the modal -->

<script>
// Get the modal
var modal = document.getElementById('addform');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none"; // when click outside of model it close
        
    }
}
</script>

</body>
</html>
