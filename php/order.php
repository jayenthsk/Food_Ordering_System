<!-- Order confirmation page shows whether order is confirmed -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Jayenth Saravanakumar"/>
    <meta name ="language" content="EN"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../css/style.php' ?>
    <title>Order Successfull !</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br><br><br>

    <!-- Form that allows user to logout -->
    <div class="">
      <form class="" action="order.php" method="post">
        <h2>Order placed sucessfully !</h2>
        <h2>Delicious food on it's way...</h2><br><br><br><br><br>
        <input type="submit" id="logout" name="logout" value="Logout">
      </form>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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


<?php //Validates the logout request of user
if(isset($_POST["logout"])){
  session_start();
  unset($_SESSION["cart"]);
  unset($_SESSION["lemail"]);
  unset($_SESSION["total"]);
  session_destroy();
  echo '<script language="javascript">';
  echo 'window.location.replace("../html/logout.html")';
  echo '</script>';
}
?>
