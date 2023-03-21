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


  #delete user detail

  if(isset($_GET['user_id'])) {

    #get delete user name

    $sql4 = "SELECT name FROM crm_users WHERE id =".$_GET['user_id']."";
    $result_name = mysqli_query($connection,$sql4);
    $name_user=mysqli_fetch_assoc($result_name);
    $name=$name_user['name'];


    $sql3 = "DELETE FROM crm_users WHERE id =".$_GET['user_id']."";
    $result = mysqli_query($connection,$sql3);
    if($result){
        echo "<script>alert(' User: $name Deleted successfully');</script>";
        echo "<script>window.location='../../../admin.php'</script>";
    }
    else {
        echo "<script>alert(' User: $name  Deleted Failed');</script>";
        echo "<script>window.location='../../../admin.php'</script>";	
    }
}