<!-- Allows admin to add new item to the menu -->

<?php //Getting data from the admin and adding it to the database
if(isset($_POST["insert"])){
  $con = mysqli_connect("localhost","root","","food");
  $idx = mysqli_real_escape_string($con,$_POST["p_id"]);  //Using mysqli_real_escape_string to avoid special
  $imagex = mysqli_real_escape_string($con,$_POST["p_image"]); //characters or symbols inserted by admin
  $namex = mysqli_real_escape_string($con,$_POST["p_name"]);
  $categoryx = mysqli_real_escape_string($con,$_POST["p_category"]);
  $hotelx = mysqli_real_escape_string($con,$_POST["p_hotel"]);
  $descriptionx = mysqli_real_escape_string($con,$_POST["p_description"]);
  $pricex = mysqli_real_escape_string($con,$_POST["p_price"]);
  $sql = "INSERT INTO foodlist (id,image,name,category,hotel,description,price)
VALUES ('$idx','$imagex','$namex','$categoryx','$hotelx','$descriptionx','$pricex');"; //Inserting new item to the menu
  mysqli_query($con,$sql);
  mysqli_close($con);
  echo '<script language="javascript">';
  echo 'alert("Item added to menu")';
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
    <title>Admin-Insert Item</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br><br>

    <!-- Form that allows admin to enter details of the new item to be added into the menu -->
    <form class="" action="insert.php" method="post">
      <fieldset>
        <p class="formtitle">Details of new item</p><br><br>
        <label for="p_id">ID                       :  </label>
        <input type="text" id="p_id" name="p_id" placeholder="Enter ID of food item..."><br><br><br>
        <label for="p_image">Enter source of image :  </label>
        <input type="text" id="p_image" name="p_image"><br><br><br>
        <label for="p_name">Name                   :  </label>
        <input type="text" id="p_name" name="p_name" placeholder="Enter name of food item..."><br><br><br>
        <label for="p_category">Category           :  </label>
        <input type="text" id="p_category" name="p_category" placeholder="Enter category of food item..."><br><br><br>
        <label for="p_hotel">Restaurant                 :  </label>
        <input type="text" id="p_hotel" id="p_hotel" name="p_hotel" placeholder="Enter restaurant name..."><br><br><br>
        <label for="p_description">Description     :  </label>
        <input type="text" id="p_description" name="p_description" placeholder="Enter description of food item..."><br><br><br>
        <label for="p_price">Price                 :  </label>
        <input type="text" id="p_price" name="p_price" placeholder="Enter price of food item"><br><br><br><br>
        <input type="submit" id="insert" name="insert" value="INSERT">
      </fieldset>
    </form><br><br><br>

    <!-- Form button allowing admin to navigate to admin dashboard -->
    <form class="" action="admin.php" method="post">
      <input type="submit" id="back_to_admin" name="back_to_admin" value="Back to Admin Dashboard">
    </form><br><br><br><br><br><br>


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
