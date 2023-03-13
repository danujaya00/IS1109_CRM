<?php require_once('./phpFunc/connection/conect.php'); 

/*
if($_SESSION["role"] == 'sales') { 
    $username = " SELECT name FROM user WHERE id = '".$_SESSION["id"]."'";
} */
 
$username='Sales_manager'; # for test

$sql = "SELECT * FROM crm_customer";
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
        <link href="./styles/businessUser/business.css" rel="stylesheet">
        <link href="./styles/businessUser/add.css" rel="stylesheet">
        <title>Business View</title>
        
</head>

<body>


<!-- header -->
<div>

<span class="wel-msg"><p>Welcome <span style="font-size:44px;"><?php echo" $username"; ?></span></p></span>
<span class="sub-head">Details</span> <div class="sub-line"></div>
<span><a href="./phpFunc/functions/buisnessUser/logout.php"><button class="log_out-button">LogOut</button> </a></span>


</div>

<!-- header over -->

<!--menu-->

<div class="menu">

<span class="menu-header">MENU</span>

        <span class="menu-item"><a href="./businessView.php">Details</a></span> <div class="menu-line"></div>
</div>

<!-- menu over -->


<!-- sub header -->




<!-- add button -->

<div>
    <span><button onclick="document.getElementById('addform').style.display='block'" class="add-button">Add</button></span>
</div>

<!-- add button over -->


<!-- adding form -->

<div id="addform" class="formbox">

<form class="formbox-content animate" action="./phpFunc/functions/businessUser/insert.php" method="post">

<span onclick="document.getElementById('addform').style.display='none'" class="close"><img  class="close-image"src="./assest/img/close.png"></span>
   
<div style="padding:5px;">

<span class="formbox-title"> ADD A CUSTOMER</span> <div class="line-dec"></div> 
<br><br>
<table class="table-dec" >

<tr>

 <td>  <label for="username">Customer ID:</label> </td> 
 <td>  <input type="text" id="username" name="cus_id" placeholder="" required> </td>  </tr>
    
 <td>    <label for="fname">First Name:</label></td>
 <td>    <input type="text" id="fname" name="f_name" placeholder="" required> </td>   </tr>

 <td>     <label for="lname">Last Name:</label></td>
 <td>    <input type="text" id="lname" name="l_name" placeholder="" required> </td>  </tr>

 <td>     <label for="mobno">Mobile Number:&nbsp;&nbsp;&nbsp;</label></td>
 <td>    <input type="text" id="mobnum" name="mob" placeholder="" required> </td>  </tr>

 <td>     <label for="address">Address:</label></td>
 <td>     <input type="text" id="add" name="address" placeholder="" required> </td>  </tr>

 <td>    <label for="email">E-mail:</label></td>
 <td>     <input type="text" id="email" name="email" placeholder="" required> </td>  </tr>

 <td>    <label for="age">Age:</label></td>
 <td>    <input type="text" id="age" name="age" placeholder="" required> </td>  </tr>

 <td>    <label for="age">Gender:</label> </td>
 <td>    Male<input type="radio" id="male" name="gender" value="Male">  &nbsp;&nbsp; Female<input type="radio" id="female" name="gender"  value="Female"> </td>   </tr>
 <tr clospan="2"><td><button class="form-button"  type="submit" name="cus_insert">ADD</button></td></tr>
 </table> <br><br><br>
    
    
    </div>
</form>



</div>

<!-- adding  form over -->



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
while ($row = mysqli_fetch_assoc($result)) {
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
            <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./phpFunc/functions/businessUser/update.php?customer_id=".$row['customer_id']."'><button class='edit-button' role='button'>Edit</button> </a>&nbsp;&nbsp;&nbsp;&nbsp;</td>

        </tr>";
}
?>

</table>



<script>
// Get the modal
var modal = document.getElementById('addform');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        
    }
}
</script>


</body>
</html>
