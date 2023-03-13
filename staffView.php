<?php require_once('./phpFunc/connection/conect.php'); 

session_start();

if(!$_SESSION["name"]) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location='./index.php'</script>";
}else{

  if($_SESSION["roles"] == 'salesman') { 
    $username = " SELECT name FROM crm_users WHERE id = '".$_SESSION["id"]."'";

    }else {
      echo "<script>alert('Invalid Login Request');</script>";
      echo "<script>window.location='./index.php'</script>";
    }

}


 
$username='Sales_manager_name'; # for test

$sql = "SELECT * FROM crm_customer ORDER BY customer_id ASC";
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
        <link href="./styles/businessUser/main.css" rel="stylesheet">
        <link href="./styles/businessUser/add.css" rel="stylesheet">
        <title>Staff View</title>
        
</head>

<body>


<!-- header -->
<div>

<span class="wel-msg"><p>Welcome <span style="font-size:44px;"><?php echo" $username"; ?></span></p></span>

<!-- sub header -->

<span class="sub-head">Details</span> <div class="sub-line"></div>

<span><a href="./phpFunc/functions/buisnessUser/logout.php"><button class="log_out-button">LogOut</button> </a></span>


</div>

<!-- header over -->


<!--menu-->

<div class="menu">

<span class="menu-header">MENU</span>

        <span class="menu-item"><a href="./staffView.php">Details</a></span> <div class="menu-line"></div>
</div>

<!-- menu over -->


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


<div class="input-pos">

<div class="title">Add a customer</div><div class="line-dec"></div><br>

<div class="subtitle"></div> <!-- no subttle added -->

      <div class="input-container ic1">
        <input id="customerid" class="input" type="text" name="cus_id" placeholder=" " required />
        <div class="cut cut-long"></div>
        <label for="firstname" class="placeholder">CustomerID</label>
      </div>

      <div class="input-container ic1">
        <input id="fname" name="f_name" class="input" type="text" placeholder=" " required />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">First name</label>
      </div>

      <div class="input-container ic2">
        <input id="lastname" name="l_name" class="input" type="text" placeholder=" " required/>
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Last name</label>
      </div>

      <div class="input-container ic2">
        <input id="mobie" name="mob" class="input" type="text" placeholder=" "required />
        <div class="cut cut-short"></div>
        <label for="mobieNO" class="placeholder">Mobile</label>
      </div>

      <div class="input-container ic2">
        <input id="email"  name="email" class="input" type="text" placeholder=" " required/>
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">E-mail</label>
      </div>

      <div class="input-container ic2">
        <input id="address"  name="address" class="input" type="text" placeholder=" "required />
        <div class="cut"></div>
        <label for="address" class="placeholder">&nbsp;Address</label>
      </div>

      <div class="input-container ic2">
        <input id="age"  name="age" class="input" type="text" placeholder=" " required/>
        <div class="cut cut-short"></div>
        <label for="age" class="placeholder">&nbsp;&nbsp;Age</label>
      </div>  

      <br>
      <div class="radio-dec-box ">
    Male<input type="radio" id="male" name="gender" value="Male">  &nbsp;&nbsp; Female<input type="radio" id="female" name="gender"  value="Female">
      </div>

      <button class="form-button"  type="submit" name="cus_insert">ADD</button>

</div>
  
    <br><br><br><br><br>
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
