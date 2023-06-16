<!-- Admin Login allows the admin to login separately using username and password and proceed to admin dashboard -->

<!-- Redirects to admin dashboard after validating the username and password -->
<?php
if(isset($_POST['admin_login'])){
  if($_POST['admin_username'] == 'admin' && $_POST['admin_password'] == '12345'){ //Checks whether login credentials are correct
    echo '<script language="javascript">';
    echo 'window.location.replace("admin.php")';                                 //Redirects to admin dashboard
    echo '</script>';
  }
  else {
    echo '<script language="javascript">';
    echo 'alert("Invalid Admin Credentials")';                                  //Alerts invalid login credentials
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
    <title>Admin Login</title>
  </head>

  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br>

    <nav>
      <ul>
       <li><a href="../index.html">Home</a></li>
       <li><a href="ourmenu.php">Our Menu</a></li>
       <li><a href="login.php">Order Now</a></li>
       <li><a href="review.php">Reviews</a></li>
       <li><a href="../html/contact.html">Contact Us</a></li>
      </ul>
    </nav><br>

    <!-- Form that asks for username and password for admin login -->
    <form class="" action="alogin.php" method="post">
      <fieldset>
        <p class="formtitle">Admin Login</p><br><br>
        <label for="admin_username">Username :  </label>
        <input type="text" id="admin_username" name="admin_username" placeholder="Enter username..."><br><br><br>
        <label for="admin_password">Password :  </label>
        <input type="password" id="admin_password" name="admin_password" placeholder="Enter password..."><br><br><br>
        <input type="submit" id="admin_login" name="admin_login" value="LOGIN">
      </fieldset>
    </form><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


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
