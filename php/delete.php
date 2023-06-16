<!-- Allows the admin to delete existing item from menu -->


<?php
$con = mysqli_connect("localhost","root","","food");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }

if(isset($_POST["delete"])){
  $namey = mysqli_real_escape_string($con,$_POST["p_name"]);  //Gets the item name given by admin
  $sql = "DELETE FROM foodlist WHERE id = '$namey'; ";      //Deletes the corresponding item from menu
  mysqli_query($con,$sql);
  echo '<script language="javascript">';
  echo 'alert("Item deleted from menu")';
  echo 'window.location.replace("admin.php")';
  echo '</script>';
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
    <title>Admin-Remove Item</title>
  </head>

  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br><br>

    <!-- Form that takes item name as input from admin to delete it from the menu -->
    <form class="" action="delete.php" method="post">
      <fieldset>
        <p class="formtitle">Details of item to be removed</p><br><br>
        <label for="p_name">ID of item :</label>
        <input type="text" id="p_name" name="p_name" placeholder="Enter ID of food item..."><br><br><br>
        <input type="submit" id="delete" name="delete" value="REMOVE">
      </fieldset>
    </form><br><br><br>

    <!-- Back to admin dashboard button takes you to admin dashboard -->
    <form class="" action="admin.php" method="post">
      <input type="submit" id="back_to_admin" name="back_to_admin" value="Back to Admin Dashboard">
    </form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
