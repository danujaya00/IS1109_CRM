<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/helpcenter/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Support</title>

    <style>

body{
    font-family: "Montserrat", sans-serif;
<<<<<<< Updated upstream
    background: linear-gradient(180deg, #EFF2F7 23%, #FFFFFF 23%);
    height: 200vh;
    overflow-x: hidden;
    
=======
    background: linear-gradient(180deg, #EFF2F7 28%, #FFFFFF 28%);
    height:140vh;
   
>>>>>>> Stashed changes
    
       
}

.headline-line{
    border-bottom: solid 5px #5875E6;
    width:240px;
    position: relative;
    top:-10px;
    left:34.5%;
}

.faq-box{
  
 
  height:425px;
 
  }





</style>
    


</head>

<body>


<div class="home-icon-pos">
<i onclick="window.location.href='../index.php';"  class="fa-solid fa-house fa-3x home-color"></i>
</div>

<div class="logo">
<a href="./helpcenter.php">
<span class="logo-text">PiZzA</span><span class="small-title">Help<span style="color:#5875E6" >Center</span></span></a> </div>

<p class="headline" style="font-size:60px;">Admin Support</p> <div class="headline-line"></div>
    
    <!--Headings-->
  <div class="faq-box">
  <br>
    <center style="font-size:30px;">FAQ:</center> <br>
    
    <a href="#login">1.Log in</a> <br><br>
    <a href="#profile">2.Navigate through your profile details </a> <br><br>
    <a href="#customer">3.Know more about your customers</a> <br><br>
    <a href="#staff">4.Know more about your staff</a> <br><br>
    <a href="#updel">5.Update and delete staff details</a>  <br><br>
    <a href="#sales">6.View sales details</a>  <br><br>
    <a href="#add">7.Add new records of employees </a> <br><br>

    </div>  
    <!--log in-->


<div class="faq-pos">

<button type="button" class="pro-view">

      <span class="pro-text" id="login">1. Log in</span> 

</button>

<div class="content">
<p> Step 01: Enter your email
    <br><br>
    Step 02: Enter Password
    Once you click on the "Log in" button, you will be redirected to the Admin home page.</p>
</div>

<br>

<button type="button" class="pro-view">

      <span class="pro-text" id="profile">2.Navigate through your profile details</span> 

</button>

<div class="content">
<p>Step 01: To navigate through your profile details, click on the profile icon.
    And you will be able to see a dropdown with your details .</p>
</div>

<br>

<button type="button" class="pro-view">

      <span class="pro-text" id="customer">3.Know more about your customers </span> 

</button>

<div class="content">
<p>Step 01: Click on the Customers button on the left.
    <br><br>
    
     Step 02: You will be able to view a table containing Customer ID, First Name, Last Name, Mobile, Address, E-mail, Age and gender of all your customers.</p>
</div>

<br>


<button type="button" class="pro-view">

      <span class="pro-text" id="staff">4. Know more about your staff </span> 

</button>


<div class="content">
<p>Step 01: Click on the Staff button on the left.
    <br><br> Step 02: You will be presented with a table containing the User ID of each employee and their respective name, Email, Role ,and Last login details.</p>
</div>

<br>

<button type="button" class="pro-view">

      <span class="pro-text" id="updel">5.Update and delete staff details</span> 

</button>

<div class="content">
<p>Step 01: Click on the Staff button on the left.
    <br><br> Step 02: In the table, You will find two buttons needed to perform deletion and update of records.</p>
</div>


<br>

<button type="button" class="pro-view">

      <span class="pro-text" id="sales">6.View sales</span> 

</button>

<div class="content">
<p>Step 01: Once clicked on the Sales button on the left, you will be presented with a table containing the Sales ID of the salesperson, Customer ID and the name of the customer, Product ID, Product name, price and the Purchased date.</p>
</div>

<br>


<button type="button" class="pro-view">

      <span class="pro-text" id="add">7.Add new records of employees </span> 

</button>

<div class="content">
<p> Step 01: Click on the Add icon and fill in the form</p>
</div>



</div>
 

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