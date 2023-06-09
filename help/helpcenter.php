<!DOCTYPE html>
<html lang="en">
<head?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/helpcenter/helpcenter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Help Center</title>
    <style>
        body {
            overflow-y: hidden;
            overflow-x: hidden;
            
        }
    </style>
    </head>

    <body>
        <div>
            <div class="home-icon-pos">
                <i onclick="window.location.href='../index.php';" class="fa-solid fa-house fa-2x home-color"></i>
            </div>

            <a href="./helpcenter.php">
                <span class="logo-text">PiZzA</span><span class="small-title">Help<span style="color:#5875E6">Center</span></span></a>

            <p class="headline">Hello, How Can We Help You?</p>
            <div class="headline-line"></div>

            <img class="img center" src="../assets/img/logo.png">

            <div class="help-cards ">
                <button onclick="window.location.href='Admin_Support.php';" class="box">
                    <i class="fa-solid fa-user fa-6x"></i>
                    <p class="box-text">Admin Support</p>
                    <i class="fa-sharp fa-solid fa-arrow-right fa-4x"></i>
                </button>


                <button onclick="window.location.href='Customer_Support.php';" class="box">
                    <i class="fa-solid fa-users fa-6x"></i>
                    <p class="box-text">Customer Support</p>
                    <i class="fa-sharp fa-solid fa-arrow-right fa-4x"></i>
                </button>


                <button onclick="window.location.href='Salesperson_Support.php';" class="box">
                    <i class="fa-solid fa-user-tie fa-6x"></i>
                    <p class="box-text">Salesman Support</p>
                    <i class="fa-sharp fa-solid fa-arrow-right fa-4x"></i>
                </button>
            </div>

        </div>



    </body>