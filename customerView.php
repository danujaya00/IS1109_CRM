<?php require_once('./phpFunc/connection/connect.php');

session_start();

if (!$_SESSION["name"]) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='./index.php'</script>";
} else {

    if ($_SESSION["roles"] !== 'customer') {

        echo "<script>alert('Invalid Login Request');</script>";
        echo "<script>window.location='./index.php'</script>";
    }
}

#profile details

$id = $_SESSION["c_id"];

$sql1 = "SELECT * FROM crm_customer WHERE customer_id =$id";
$result_user = mysqli_query($connection, $sql1);
$row_user = mysqli_fetch_assoc($result_user);



#$username='Sales_manager_name'; # for test

$sql = "SELECT * FROM crm_customer where customer_id = $id";
mysqli_query($connection, $sql);
$result = mysqli_query($connection, $sql);

if ($result) {
    //echo "Sucessfull";
} else {
    echo "failed";
}
?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./styles/customer/customerstyles.css" rel="stylesheet">
    <title>Customer View</title>
</head>

<body>

    <div class="menu">
        <div class="piza-logo-container"><img class="piza-logo" src="./assets/img/logo.png">
            <span class="menu-text" style="color:orange;">PiZzA</span><br><span class="menu-sub-text">Customer</span>
        </div>
        <div class="menu-container">
            <!-- pro view start -->
            <button class="pro-view">
                <img class="pro-avatar" src="./assets/img/pro_avatar.png">
                <span class="pro-text">Profile </span>
            </button>

            <div id="content-box" class="content">
                <p>First Name: <br><?php echo $_SESSION['name']; ?><br><br>
                    Email : <br> <?php echo " " . $row_user['email'] . " "; ?><br><br>
            </div>
            <!--pro view over -->
            <a href='./customerView.php'>
                <button class="menu-button">
                    <img class="details-logo" src="./assets/img/mydetails.png">
                    <span class="menu-button-text">My Details</span>
                </button>
            </a>
            <a href='./customersales.php'>
                <button class="menu-button">
                    <img class="sales-logo" src="./assets/img/sales.png">
                    <span class="menu-button-text">Purchses</span>
                </button>
            </a>
        </div>
    </div>
    <div class="header-layout">
        <div>
            <span class="wel-msg">
                <h1>Welcome Back : <span style="font-size:40px; font-style: italic; color:orange "><?php echo $_SESSION["name"]; ?></span></>
            </span>
        </div>
        <div class="logout">
            <a href="./phpFunc/functions/customer/logout.php"><button class="log_out-button no-deco">Logout</button> </a>
        </div>
    </div>
    <div class="body-layout">
        <!-- user view table -->

        <div class="details-container">
            <h1 class=" user-details-head">Your Details</h1>
            <hr>
            <table class=" flex-centered user-details">
                <?php
                $row = mysqli_fetch_assoc($result);
                echo "
                <tr>
                    <td class='item'> Customer Id</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['customer_id'] . "</td>
                </tr>
                <tr>
                    <td class='item'> First Name</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['fname'] . "</td>
                </tr>
                <tr>
                    <td class='item'> Last Name</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['lname'] . "</td>
                </tr>
                <tr>
                    <td class='item'> Mobile</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['mob'] . "</td>
                </tr>
                <tr>
                    <td class='item'> Address</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['address'] . "</td>
                </tr>
                <tr>
                    <td class='item'> Email</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['email'] . "</td>
                </tr>
                <tr>
                    <td class='item'> Age</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['age'] . "</td>
                </tr>
                <tr>
                    <td class='item'> Gender</td>
                    <td class='colon'> : </td>
                    <td class='value'>" . $row['gender'] . "</td>
                    
                 </tr>
                <tr> <td colspan='3'><a href='./phpFunc/functions/customer/update.php?customer_id=" . $row['customer_id'] . "'><button class='edit-button' role='button'>Edit</button> </a></td> </tr>   ";

                ?>
            </table>
        </div>
    </div>
    <!-- script for get the modal -->

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


    <script>
        // Get the modal
        var modal = document.getElementById('addform');


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none"; // when click outside of model it close

            }
        }
    </script>
</body>

</html>