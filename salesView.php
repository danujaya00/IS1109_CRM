<?php require_once('./phpFunc/connection/connect.php'); 

session_start();

if(!($_SESSION["name"] AND $_SESSION["id"] AND $_SESSION["roles"] )) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location='./index.php'</script>";
}else{

  if($_SESSION["roles"] !== 'salesman') { 
  
      echo "<script>alert('Invalid Login Request');</script>";
      echo "<script>window.location='./index.php'</script>";
    }

}

#profile details

    $id = $_SESSION["id"];

    $sql1 = "SELECT * FROM crm_users WHERE id =$id";
    $result_user = mysqli_query($connection,$sql1);
    $row_user=mysqli_fetch_assoc($result_user);





// $sql = "SELECT * FROM sales_details ORDER BY purchased_date ASC";
// mysqli_query($connection, $sql);
// $result = mysqli_query($connection,$sql);

// if($result){
// //echo "Sucessfull";
// }
// else{
// echo"failed";	
// }

$sql2 = "SELECT d.Sales_ID as s_id , d.customer_id as c_id, concat(c.fname ,' ', c.lname ) as cust_name , d.Product_ID as p_id, d.Purchased_date as pd, p.Product_Name as item, p.Price_per_unit as price  
FROM sales_details as d , crm_product as p ,crm_customer as c
where d.Product_ID = p.Product_ID and d.customer_id = c.customer_id order by d.Purchased_date";
mysqli_query($connection, $sql2);
$result = mysqli_query($connection,$sql2);

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
        <title>Sales View</title>
        
</head>

<body>


<!-- header -->
<div>

<span class="wel-msg"><p>Welcome <span style="font-size:44px;"><?php echo $_SESSION["name"]; ?></span></p></span>

<!-- sub header -->

<span class="sub-head">Sales Details</span> <div class="sub-line"></div>

<span><a href="./phpFunc/functions/businessUser/logout.php"><button class="log_out-button">Logout</button> </a></span>


</div>

<!-- header over -->


<!--menu-->

<div class="menu">

<div class="piza-staff"><img class="piza-logo" src="./assets/img/logo.png">

<span class="menu-text" style="color:orange;">PiZzA</span><br><span class="menu-text" style="font-size:28px; color:white; position:relative; left:100px; bottom:45px;">Staff</span>

</div>

 <div class="menu-line"></div>

  <!-- pro view start -->
<button class="pro-view">


      <img class="pro-avatar" src="./assets/img/pro_avatar.png">
      <span class="pro-text">Profile </span> 

</button>

<div id="content-box" class="content">
<p>First Name:  <?php echo $_SESSION["name"]; ?><br><br>
   Email : <?php echo" ". $row_user['email'] . " ";?><br><br>
   Role :  <?php echo" ". $row_user['roles'] . " ";?> </p>
</div>

<!-- sales but-->

<a href="./salesView.php"><button class="sales-but">

      <img class="sales-logo" src="./assets/img/sales.png">
      <span class="sales-text">Sales </span> 


</button></a>

<!--customer butt-->

<a href="staffView.php"><button  class="cus-but">

      <img class="cus-logo" src="./assets/img/cus_det.png">
      <span class="cus-text">Customer</span> 

</button></a>

<!-- this should send the user to edit user details page -->
<!-- businessUser/updatecred.php -->

<!-- businessUser/updatecred.php -->

<button class="up-but"  style="top:515px;"onclick="document.getElementById('updatePwd').style.display='block'"  >
<img class="up-logo" src="./assets/img/pwd.png">
<span class="up-text">Update User<br><span style="position:relative; left:23px;"> Password</span></span>  
      

</button>  


</div> <!-- menu div -->

<!-- menu over -->

<!-- update pwd salesman -->



<div id="updatePwd" class="formbox-update">

<form class="formbox-content-update animate" action="./phpFunc/functions/businessUser/updatecred.php" method="post" onsubmit="return checkPwd()">

<span onclick="document.getElementById('updatePwd').style.display='none'" class="close-update"><img  class="close-image-update" src="./assets/img/close.png"></span>
   
<div style="padding:5px;">


<div class="input-pos">

<div class="title">Update Password</div><div class="line-dec"></div><br>

<div class="subtitle"><p id="password-error" style="color: red; display: none;">Passwords do not match!</p></div>

    
      <div class="input-container ic1">
        <input id="password" 
        name="pwd" 
        class="input" 
        type="password" 
        placeholder=" " required />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Password</label>
      </div>

      <div class="input-container ic1">
        <input id="retype-password" 
        name="re-pwd" 
        class="input" 
        type="password" 
        placeholder=" " required />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Retype Password</label>
      </div>

      <input type="hidden" name="user_id" value="<?php echo $_SESSION["id"];?>">

      <button class="form-button-update"  type="submit" name="update_pwd">UPDATE</button>

</div>
  
    <br><br><br><br><br>
     </div>
</form>

<!-- check pwd -->
<script>

  function checkPwd() {
  var password = document.getElementById("password").value;
  var retypePassword = document.getElementById("retype-password").value;
  var passwordError = document.getElementById("password-error");

  
    if (password !== retypePassword) {
      passwordError.style.display = "block";
      return false;
      

    } else {
      passwordError.style.display = "none";
      return true;
     
    }
  }
  
</script>


</div>

<!-- update pwd  form over -->

<!-- user view table -->

<table border="0" class="table_dec2">

<tr bgcolor="#404040"> 

<th>Sales ID</th>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Product ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Purchased Date</th>

</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "  
        <tr bgcolor='#373737'>
            <td style='height:40px;'>" . $row['s_id'] . "</td>
            <td>" . $row['c_id'] . "</td>
            <td>" . $row['cust_name'] . "</td>
            <td>" . $row['p_id'] . "</td>
            <td>" . $row['item'] . "</td>
            <td>" . $row['price'] . "</td>
            <td>" . $row['pd'] . "</td>
        </tr>";
}
?>

</table>

<!-- user view table over -->


<script>
var coll = document.getElementsByClassName("pro-view");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>


</body>
</html>