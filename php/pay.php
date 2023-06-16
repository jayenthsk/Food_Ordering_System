<?php
session_start();
$con = mysqli_connect("localhost","root","","food");
    if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}

$email = $_SESSION["lemail"];


if(isset($_POST["pay_submit"])){
  if ($_POST['paddress'] == '') {                                      //Checks whether address is entered
    echo '<script language="javascript">';
    echo 'alert("Please Enter Address")';
    echo '</script>';
  }
  elseif ($_POST['pbank'] == '') {                                    //Checks whether bank name is entered
    echo '<script language="javascript">';
    echo 'alert("Please Enter Bank Name")';
    echo '</script>';
  }
  elseif (strlen($_POST['pcardnumber']) != 16) {                     //Checks whether customer has entered valid credit/debit card number
    echo '<script language="javascript">';
    echo 'alert("Please Enter Valid Credit/Debit Card Number")';
    echo '</script>';
  }
  elseif (strlen($_POST['pcardcvv']) != 3) {                        //Checks whether customer has entered valid CVV
    echo '<script language="javascript">';
    echo 'alert("Please Enter Valid CVV")';
    echo '</script>';
  }
  elseif ($_POST['pcardname'] == '') {                             //Checks whether customer has entered name on card
    echo '<script language="javascript">';
    echo 'alert("Please Enter Name On Card")';
    echo '</script>';
  }
  elseif($_POST['pcardexpiry'] == ''){                            //Checks whether customer has entered valid card expiry date
    echo '<script language="javascript">';
    echo 'alert("Please Enter Card Expiry")';
    echo '</script>';
  }
  else{
    $email = $_SESSION["lemail"];
    $address = mysqli_real_escape_string($con,$_POST["paddress"]);
    $sql = "UPDATE carts SET address = '$address' WHERE email = '$email' AND name = 'Above order placed successfully' ;";
    mysqli_query($con,$sql);
    echo '<script language="javascript">';
    echo 'window.location.replace("order.php")';                 //Redirects to order confirmation page
    echo '</script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Jayenth Saravanakumar"/>
    <meta name ="language" content="EN"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../css/style.php' ?>
    <title>Payment</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br><br>

    <!-- Payment form allowing customer to enter payment details -->
    <form class="" action="pay.php" method="post">
      <fieldset>
        <p class="formtitle">Delivery Details</p><br><br>
        <p>Total amount payable : Rs. <?php echo " ".$_SESSION['total']." " ?></p>   <!-- Displays total using sessions -->
        <label for="paddress">Address :</label>
        <input type="text" id="paddress" name="paddress" placeholder="Enter delivery address..."><br><br><br>
        <h4>Due to the Covid-19 pandemic situation, we are currently accepting only credit/debit card based payments.</h4>
        <h4>Sorry for the inconvenience ...</h4><br><br>
        <label for="pbank">Enter Bank :</label>
        <input type="text" id="pbank" name="pbank"><br><br><br>
        <label for="pcardname">Name on card :</label>
        <input type="text" id="pcardname" name="pcardname"><br><br><br>
        <label for="pcardnumber">Card Number :</label>
        <input type="text" id="pcardnumber" name="pcardnumber" minlength="16" maxlength="16"><br><br><br>
        <label for="pcardexpiry">Expiry Date :</label>
        <input type="month" id="pcardexpiry" name="pcardexpiry"><br><br><br>
        <label for="pcardcvv">C V V :</label>
        <input type="password" id="pcardcvv" name="pcardcvv" minlength="3" maxlength="3"><br><br><br>
        <input type="submit" id="pay_submit" name="pay_submit" value="PAY">
      </fieldset>
    </form><br><br><br><br><br><br><br><br><br><br>


    <footer>
      <div class="footercontent">
        All rights reserved. &#169;<br>
        <a href="../html/privacy-policy.html">Privacy-Policy</a><br>
        This is a prototype restaurant online food ordering website, which enables users to order food and admin to view orders, add and delete items in menu, view customers, and also provides a basic idea of what customers order often, etc,.<br>
        We store customer information like username, e-mail, password, mobile no., and address. <br>
        While using this website you agree to our data storage, cookies, and privacy policy.<br>
        We store this data only to facilitate the user experience and do not intend to use it for any other irreleveant/inappropriate purposes.<br>
        The data is securely stored in our database.<br>
      </div>
    </footer>
  </body>
</html>
