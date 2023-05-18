<!DOCTYPE html>
<html>

<head>
  <title>PiZzA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./styles/loginstyles.css" />
</head>

<body>
  <div class="container" id="container">
    <div class="form-container log-in-container">
      <form>
        <h1>Welcome to <span class="logo-text">PiZzA</span></h1>
        <h5 >The biggest pizza shop in Colombo</h5><br>
        <div class="mt-30">
          <input type=button onClick="parent.location='./loginStaff.php'" class="homebutton" value='Staff Login'>
          <br />
          <input type=button onClick="parent.location='./loginCustomer.php'" class="homebutton" style="background-color: gray;" value='Customer'>
          <a href="./help/helpcenter.php" class="help"><i class="fa-sharp fa-solid fa-circle-info "></i>&nbsp;Need Help?</a><br>
          &nbsp; &nbsp; &nbsp;<a href="./functionalities.html" class="help"><i class="fa fa-tasks" aria-hidden="true"></i>
            &nbsp;Functionalities</a>

        </div>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <img class="overlay-image" src="./assets/img/pizza-logo-image-ornage.png" />
        </div>
      </div>
    </div>
  </div>
</body>

</html>