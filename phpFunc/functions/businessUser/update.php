<?php require_once('../../connection/conect.php'); 

if(isset($_GET['customer_id'])) {
    $sql1 = "SELECT * FROM crm_customer WHERE customer_id =".$_GET['customer_id']."";
    $result = mysqli_query($connection,$sql1);
    if($result){
        $row=mysqli_fetch_assoc($result);
    }
    else {
        echo"failed";	
    }
}

if(isset($_POST['update'])){
    $sql2 = "UPDATE crm_customer SET fname = '".$_POST['f_name']."', lname = '".$_POST['l_name']."', mob = '".$_POST['mob']."', address = '".$_POST['address']."', email = '".$_POST['email']."', age = '".$_POST['age']."', gender = '".$_POST['gender']."' WHERE customer_id = '".$_POST['cus_id']."'";
    $result2 = mysqli_query($connection,$sql2);

    if($result2) {
        echo "<script>alert('Updated successfully');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }
    
     
}


    


?>

<!DOCTYPE html>
<html>
 
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../../styles/businessUser/update.css" rel="stylesheet">
        <title>Customer Update</title>
        
</head>

<body>


<!-- header -->
<div>


<span class="wel-msg"><p>Update Customer</p></span><div class="line-dec"></div>
<span><a href="./logout.php"><button class="log_out-button">LogOut</button> </a></span>


</div>

<!-- header over -->

<!-- user update view table -->

<table border="0" class="table_dec">

<tr bgcolor="#404040"> 

<th>Customer ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Mobile</th>
<th>Address</th>
<th>E-mail</th>
<th>&nbsp;&nbsp;Age&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

</tr> 

<form action="update.php" method="post">
<tr bgcolor='#373737'>

    
<?php echo "<td><input type='text' name='cus_id' value=".$row['customer_id']." readonly></td>";
       echo"<td><input type='text' name='f_name' value=".$row['fname']." ></td>";
       echo"<td><input type='text' name='l_name' value=".$row['lname']." ></td>";
       echo"<td><input type='text' name='mob' value=".$row['mob']." ></td>";
       echo"<td><input type='text' name='address' value=".$row['address']." ></td>";
       echo"<td><input type='text' name='email' value=".$row['email']." ></td>";
       echo"<td><input type='text' name='age' value=".$row['age']." ></td>";
       echo "<td> <select name='gender'>
       <option value=".$row['gender'].">Current :".$row['gender']."</option>
       <option value='Male'>Male</option>
       <option value='Female' >Female</option></select></td>";
?>
</table>
<button type=submit name="update" class='edit-button' role='button'>Update</button> 
</form>

<a href="../../../staffView.php"><button class='back-button' role='button'>Back</button></a>



</body>
</html>

