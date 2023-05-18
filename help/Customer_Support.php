<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/helpcenter/helpcenter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Customer Support</title>

  <style>
    body {
      font-family: "Montserrat", sans-serif;
      overflow-x: hidden;
      height: 720px;


    }

    .headline-line {
      border-bottom: solid 5px #5875E6;
      width: 240px;
      position: relative;
      top: -65px;
      left: 32%;
    }

    .faq-box{

left:30px;
width: 500px;
height:330px;
}
    .faq-pos{

top: 296px;

  }

    
  </style>

</head>

<body>

  <div class="home-icon-pos">
    <i onclick="window.location.href='../index.php';" class="fa-solid fa-house fa-2x home-color"></i>
  </div>

  <a href="./helpcenter.php">
    <span class="logo-text">PiZzA</span><span class="small-title">Help<span style="color:#5875E6">Center</span></span></a>

  <p class="headline-page" style="font-size:60px;">Customer Support</p>
  <div class="headline-line"></div>


  <!--Headings-->
  <div class="faq-box">
    <br>
    <center style="font-size:30px;">FAQ:</center> <br>

    <a href="#">1. How to Log in ?</a> <br><br>
    <a href="#">2. How to Know your First name and the registered email ?</a> <br><br>
    <a href="#">3. How to Know more about your purchases ?</a> <br><br>
    <a href="#">4. How to Know more about your profile ?</a> <br><br>
    <a href="#">5. How to Update your profile details ?</a> <br><br>

  </div>


  <!-- faq -->

  <div class="faq-pos">

    <button type="button" class="pro-view">

      <span class="pro-text" id="login">1. Log in</span>

    </button>

    <div class="content">
      <p> Step 01: Enter your Username
        <br><br>
        Step 02: Enter your mobile number as the password
        Once you click on the "Log in" button, you will be redirected to the customer home page.
      </p>
    </div>

    <br>

    <button type="button" class="pro-view">

      <span class="pro-text" id="profile">2.Navigate through your profile details</span>

    </button>

    <div class="content">
      <p> Step 01: To navigate through your profile details, click on the profile icon.
        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; And you will be able to see a dropdown with your details .
      </p>
    </div>

    <br>

    <button type="button" class="pro-view">

      <span class="pro-text" id="purchase">3.Get your purchase history</span>

    </button>

    <div class="content">
      <p>Step 01: Click on the Customers button on the left.
        <br><br>

        Step 02: You will be able to view a table containing Customer ID, First Name, Last Name, Mobile, Address, E-mail, Age and gender of all your customers.
      </p>
    </div>

    <br>


    <button type="button" class="pro-view">

      <span class="pro-text" id="details">4. Know more about your staff </span>

    </button>


    <div class="content">
      <p>SStep 01: Click on the deails button on the left.
        <br><br> Step 02: You will be presented with a table containing the Customer ID, First name, Last name used used when registering your account, mobile number, address, E-mail, age and gender.
    </div>

    <br>

    <button type="button" class="pro-view">

      <span class="pro-text" id="update">5.Update your profile details</span>

    </button>

    <div class="content">
      <p>Step 01: Click on the Details button on the left.
        <br><br> Step 02: In the table, You will find the button "Edit" needed to update your profile details.
      </p>
    </div>

  </div>


  <script>
    var coll = document.getElementsByClassName("pro-view");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });
    }
  </script>

</body>

</html>