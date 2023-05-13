<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../styles/helpcenter/helpcenter.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <title>Salesperson Support</title>

      <style>
            body {
                  font-family: "Montserrat", sans-serif;
                  overflow-x: hidden;


            }

            .headline-line {
                  border-bottom: solid 5px #5875E6;
                  width: 240px;
                  position: relative;
                  top: -65px;
                  left: 30%;
            }
      </style>



</head>

<body>

      <div class="home-icon-pos">
            <i onclick="window.location.href='../index.php';" class="fa-solid fa-house fa-2x home-color"></i>
      </div>

      <a href="./helpcenter.php">
            <span class="logo-text">PiZzA</span><span class="small-title">Help<span style="color:#5875E6">Center</span></span></a>

      <p class="headline-page" style="font-size:60px;">Salesperson Support</p>
      <div class="headline-line"></div>


      <div class="faq-box">
            <br>
            <center style="font-size:30px;">FAQ:</center> <br>

            <a href="#">1.How to Log in ?</a> <br><br>
            <a href="#">2.How to Navigate through your profile details ?</a> <br><br>
            <a href="#">3.How to Know more about your customers ?</a> <br><br>
            <a href="#">4.How to Update Customer details ?</a> <br><br>
            <a href="#">5.How to View sales details ?</a> <br><br>
            <a href="#">6.How to Add a customer ?</a> <br><br>

      </div>

      <!-- faq -->

      <div class="faq-pos">

            <!--1-->

            <button type="button" class="pro-view">

                  <span class="pro-text" id="login">1. Log in</span>

            </button>

            <div class="content">
                  <p>Step 01: Enter your email
                        <br><br>
                        Step 02: Enter Password
                        Once you click on the "Log in" button, you will be redirected to the Admin home page.
                  </p>
            </div>

            <br>

            <!--2-->

            <button type="button" class="pro-view">

                  <span class="pro-text" id="profile">2.Navigate through your profile details</span>

            </button>

            <div class="content">
                  <p> Step 01: To navigate through your profile details, click on the profile icon.
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; And you will be able to see a dropdown with your details .
                  </p>
            </div>

            <br>

            <!--3-->

            <button type="button" class="pro-view">

                  <span class="pro-text" id="customer">3.Know more about your customers</span>

            </button>

            <div class="content">
                  <p>Step 01: Click on the Customers button on the left.
                        <br><br>

                        Step 02: You will be able to view a table containing Customer ID, First Name, Last Name, Mobile, Address, E-mail, Age and gender of all your customers.
                  </p>
            </div>

            <br>

            <!--4-->

            <button type="button" class="pro-view">

                  <span class="pro-text" id="staff">4.Update customer details</span>

            </button>


            <div class="content">
                  <p> Step 01: Click on the Staff button on the left.
                        <br><br> Step 02: In the table, You will find the button "Edit" needed to update your customer details.
                  </p>
            </div>

            <br>

            <!--5-->

            <button type="button" class="pro-view">

                  <span class="pro-text" id="updel">5.View sales</span>

            </button>

            <div class="content">
                  <p>Step 01: Once clicked on the Sales button on the left, You will be presented with a table<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; containing the Sales ID of the salesman, Customer ID and the name of the<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; customer, Product ID, Product name, price and the Purchased date.</p>
            </div>

            <br>

            <!--6-->

            <button type="button" class="pro-view">

                  <span class="pro-text" id="sales">6.Add a new customer</span>

            </button>

            <div class="content">
                  <p>Step 01: Click on the Add icon and fill in the form and click on "Add".</p>
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