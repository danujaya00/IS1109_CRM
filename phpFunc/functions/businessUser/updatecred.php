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


#update user

if(isset($_POST['update_pwd'])){
    $sql2 = "UPDATE crm_users SET password = '".$_POST['pwd']."' WHERE id = '".$_POST['user_id']."'";
    $result2 = mysqli_query($connection,$sql2);

    if($result2) {
        echo "<script>alert('Updated successfully');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    }
    
     
}



?>


