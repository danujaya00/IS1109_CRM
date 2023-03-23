<?php require_once('./phpFunc/connection/connect.php'); 

session_start();

if(!$_SESSION["name"]) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location='./index.php'</script>";
}
else{

    if($_SESSION["roles"] !== 'customer') { 
    
        echo "<script>alert('Invalid Login Request');</script>";
        echo "<script>window.location='./index.php'</script>";
    }
    
  }

#profile details

    $id = $_SESSION["c_id"];

    $sql1 = "SELECT * FROM crm_customer WHERE customer_id =$id";
    $result_user = mysqli_query($connection,$sql1);
    $row_user=mysqli_fetch_assoc($result_user);



#$username='Sales_manager_name'; # for test

$sql2 = "SELECT d.Sales_ID as s_id , d.Product_ID as p_id, d.Purchased_date as pd, p.Product_Name as item, p.Price_per_unit as price  FROM sales_details as d , crm_product as p  where d.Product_ID = p.Product_ID and d.customer_id = $id";
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
        <link href="./styles/customer/cusmain.css" rel="stylesheet">
        <title>Customer View</title>
        
</head>

<body>


<!-- header -->
<div>

<span class="wel-msg"><p>Welcome <span style="font-size:44px;"><?php echo $_SESSION["name"]; ?></span></p></span>

<!-- sub header -->

<span class="sub-head">Purchases    </span> <div class="sub-line"></div>

<span><a href="./phpFunc/functions/customer/logout.php"><button class="log_out-button">Logout</button> </a></span>


</div>

<!-- header over -->


<!--menu-->

<div class="menu">

<div class="piza-staff"><img class="piza-logo" src="./assets/img/logo.png">

<span class="menu-text" style="color:orange;">PiZzA</span>

</div>

 <div class="menu-line"></div>

  <!-- pro view start -->
<button class="pro-view">


      <img class="pro-avatar" src="./assets/img/pro_avatar.png">
      <span class="pro-text">Profile </span> 

</button>

<div id="content-box" class="content">
<p>First Name:  <?php echo $_SESSION['name']; ?><br><br>
   Email : <?php echo" ". $row_user['email'] . " ";?><br><br>
</div>

<!--pro view over -->

<a href='./custViewUserDetails.php'><button class="sales-but">

      <img class="sales-logo" src="./assets/img/sales.png">
      <span class="sales-text" style="font-size: large;"> My Details </span> 


</button></a>
<!-- <a href='./customerViewSales.php'><button class="sales-but">

      <img class="sales-logo" src="./assets/img/sales.png">
      <span class="sales-text" style="font-size: large;">Purchses </span> 


</button></a> -->





</div> <!-- menu div -->

<!-- menu over -->

<!-- user view table -->

<table border="0" class="table_dec">

<tr bgcolor="#404040" > 

<th>Invoice ID</th>
<th>Product ID</th>
<th>Date</th>
<th>Item Name</th>
<th>Price</th>

</tr>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <tr bgcolor='#373737' height='35px'>
            <td>" . $row['s_id'] . "</td>
            <td>" . $row['p_id'] . "</td>
            <td>" . $row['pd'] . "</td>
            <td>" . $row['item'] . "</td>
            <td>" . $row['price'] . "</td>
        </tr>";
}
?>

</table>

<!-- user view table over -->


<!-- script for get the modal -->

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
