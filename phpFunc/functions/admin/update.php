<?php session_start(); ?>
<?php require_once('../../connection/connect.php'); ?>


<?php

#login check

if(!($_SESSION["name"] AND $_SESSION["id"] AND $_SESSION["roles"] )) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='../../../index.php'</script>";
  }else{
  
    if($_SESSION["roles"] !== 'admin') { 
    
        echo "<script>alert('Invalid Login Request');</script>";
        echo "<script>window.location='../businessUser/logout.php'</script>";
      }
  
  }

#get user detail

  if(isset($_GET['user_id'])) {
    $sql3 = "SELECT * FROM crm_users WHERE id =".$_GET['user_id']."";
    $result = mysqli_query($connection,$sql3);
    if($result){
        $row=mysqli_fetch_assoc($result);
    }
    else {
        echo"failed";	
    }
}

#profile details

$id = $_SESSION["id"];

$sql1 = "SELECT * FROM crm_users WHERE id =$id";
$result_user = mysqli_query($connection,$sql1);
$row_user=mysqli_fetch_assoc($result_user);


#update user

if(isset($_POST['update'])){
    $sql2 = "UPDATE crm_users SET name = '".$_POST['name']."', email = '".$_POST['email']."', password = '".$_POST['password']."' WHERE id = '".$_POST['user_id']."'";
    $result2 = mysqli_query($connection,$sql2);

    if($result2) {
        echo "<script>alert('Updated successfully');</script>";
        echo "<script>window.location='../../../admin.php'</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
        echo "<script>window.location='../../../admin.php'</script>";
    }
    
     
}



?>

<!DOCTYPE html>
<html>
 
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../../styles/businessUser/update.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Customer Update</title>
        
</head>

<body>


<!-- header -->
<div>


<span><a href="../businessUser/logout.php"><button class="log_out-button">Logout</button> </a></span>


</div>

<!-- header over -->


<!--menu-->

<div class="menu">

<div class="piza-staff"><img class="piza-logo" src="../../../assets/img/logo.png">

<span class="menu-text" style="color:orange;">PiZzA</span><br><span class="menu-text" style="font-size:25px; color:white; postion:relative; left:90px; bottom:45px;">Admin</span>

</div>

 <div class="menu-line"></div>



<div style="position:relative; top:105px;"> <!-- div for space for staff button-->

<!--customer butt-->

<a href="../../../adminCustomerView.php"><button class="sales-but">
<button  class="cus-but">

      <img class="cus-logo" src="../../../assets/img/cus_det.png">
      <span class="cus-text">Customers</span> 

</button>
</a>
<!-- sales but-->

<a href="../../../adminSalesView.php"><button class="sales-but">

      <img class="sales-logo" src="../../../assets/img/sales.png">
      <span class="sales-text">Sales </span> 


</button></a>
</div>

<!-- staff button-->

<a href="../../../admin.php"><button class="staff-but">


      <img class="staff-logo" src="../../../assets/img/staff.png">
      <span class="staff-text"> &nbsp;&nbsp;Staff</span> 

</button>
</a>


  <!-- pro view start -->
  <button class="pro-view">


<img class="pro-avatar" src="../../../assets/img/pro_avatar.png">
<span class="pro-text">Profile </span> 

</button>

<div id="content-box" class="content">
<p>First Name:  <?php echo $_SESSION["name"]; ?><br><br>
Email : <?php echo" ". $row_user['email'] . " ";?><br><br>
Role :  <?php echo" ". $row_user['roles'] . " ";?> </p>
</div>


</div> <!-- menu div -->

<!-- menu over -->


<!-- update form -->


<div class=cont-pos>
<div class="container-admin" id="container">

<div class="form-container-admin">
    
<form action="update.php" method="post">
<a href="../../../admin.php"><i class="fa-solid fa-arrow-left fa-3x navigation"></i></a>
<div class="title">Update Salesman</div><div class="line-dec2"></div><br>
<?php

echo "<div class='input-container ic1'>";
echo "<input id='customerid' class='input' type='text' name='user_id' placeholder='' value=".$row['id']." readonly />";
echo "<div class='cut cut-short'></div>";
echo "<label for='firstname' class='placeholder'>UserID</label>";
echo "</div>";

echo "<div class='input-container ic1'>";
echo "<input id='fname' name='name' class='input' type='text' placeholder=' ' value=".$row['name']." required>";
echo "<div class='cut cut-short'></div>";
echo "<label for='firstname' class='placeholder'>Name</label>";
echo "</div>";

echo "<div class='input-container ic2'>";
echo "<input id='lastname' name='email' class='input' type='text' placeholder=' ' value=".$row['email']." required >";
echo "<div class='cut cut-short'></div>";
echo "<label for='lastname' class='placeholder'>Email</label>";
echo "</div>";

echo "<div class='input-container ic2'>";
echo "<input id='lastname' name='password' class='input' type='password' placeholder=' ' value=".$row['password']." required >";
echo "<div class='cut'></div>";
echo "<label for='lastname' class='placeholder'>Password</label>";
echo "</div>";


echo "<button type='submit' name='update' class='update-button-admin' role='button'>Update</button>"
?>

</form>
</div>
</div>

<!-- update form  over-->


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

</body>
</html>

