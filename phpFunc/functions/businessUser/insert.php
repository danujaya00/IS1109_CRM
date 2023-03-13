<?php
require_once('../../connection/conect.php'); 

	if(isset($_POST['cus_insert'])){

	$sql = "INSERT INTO crm_customer (customer_id,fname,lname,mob,address,email,age,gender) VALUES ('".$_POST['cus_id']."','".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['mob']."','".$_POST['address']."','".$_POST['email']."','".$_POST['age']."','".$_POST['gender']."')";

	$result = mysqli_query($connection,$sql);
	if($result) {
        echo "<script>alert(' Cutomer: ".$_POST['f_name']." ".$_POST['l_name']." added successfully');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    } else {
        echo "<script>alert(' Customer: ".$_POST['f_name']." ".$_POST['l_name']." adding failed');</script>";
    }
    }
?>