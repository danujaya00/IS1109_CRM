<?php session_start(); ?>
<?php require_once('../../connection/connect.php'); ?>


<?php

#login check

if(!($_SESSION["name"] AND $_SESSION["id"] AND $_SESSION["roles"] )) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='../../../index.php'</script>";
  }else{
  
    if($_SESSION["roles"] !== 'salesman') { 
    
        echo "<script>alert('Invalid Login Request');</script>";
        echo "<script>window.location='../businessUser/logout.php'</script>";
      }
  
  }


  #delete user detail

  if(isset($_GET['customer_id'])) {

    #get delete user name

    $sql4 = "SELECT fname FROM crm_customer WHERE customer_id =".$_GET['customer_id']."";
    $result_name = mysqli_query($connection,$sql4);
    $name_customer=mysqli_fetch_assoc($result_name);
    $name=$name_customer['fname'];


    $sql3 = "DELETE FROM crm_customer WHERE customer_id =".$_GET['customer_id']."";
    $result = mysqli_query($connection,$sql3);
    if($result){
        echo "<script>alert(' Customer: $name Deleted successfully');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    }
    else {
        echo "<script>alert(' User: $name  Delete Failed');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";	
    }
}