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





$sql = "SELECT * FROM sales_details ORDER BY purchased_date ASC";
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

<span class="menu-text" style="color:orange;">PiZzA</span><br><span class="menu-text" style="font-size:28px; color:white; postion:relative; left:100px; bottom:45px;">Staff</span>

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



</div> <!-- menu div -->

<!-- menu over -->



<!-- user view table -->

<table border="0" class="table_dec2">

<tr bgcolor="#404040"> 

<th>Sales ID</th>
<th>Product ID</th>
<th>Customer ID</th>
<th>Purchased Date</th>

</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <tr bgcolor='#373737'>
            <td style='height:40px;'>" . $row['Sales_ID'] . "</td>
            <td>" . $row['Product_ID'] . "</td>
            <td>" . $row['customer_id'] . "</td>
            <td>" . $row['Purchased_date'] . "</td>
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