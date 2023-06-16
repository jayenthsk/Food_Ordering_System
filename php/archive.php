<!-- Allows the admin to archive an order that's delivered-->

<?php
$con = mysqli_connect("localhost","root","","food");
    if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Jayenth Saravanakumar"/>
    <meta name ="language" content="EN"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../css/style.php' ?>
    <title>Admin-Archive Order</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br><br>

    <!-- Form button allowing admin to navigate to admin dashboard -->
    <form class="" action="admin.php" method="post">
      <input type="submit" id="back_to_admin" name="back_to_admin" value="Back to Admin Dashboard">
    </form><br><br><br>

    <!-- Form that allows the admin to enter e-mail of user to archive -->
    <form class="" action="archive.php" method="post">
      <fieldset>
        <p class="formtitle">Archive Order</p>
        <label for="email_archive">E-Mail of customer :</label>
        <input type="text" id="email_archive" name="email_archive" placeholder="Enter e-mail of customer"><br><br>
        <input type="submit" name="archive" value="ARCHIVE">
      </fieldset>
    </form><br><br>

    <!-- Displays all the orders -->
    <?php
    $sql = "SELECT * FROM carts";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
      ?>
        <table id="order">
          <tr>
            <th>E-Mail</th>
            <th>Items</th>
            <th>Quantities</th>
            <th>Price</th>
            <th>Address</th>
          </tr>
          <?php while($row = mysqli_fetch_array($result)){ ?>
          <tr>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['address']; ?></td>
          </tr>

        <?php
      } ?></table><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php }else{?>
      <h2>No orders to show...</h2>
  <?php  } ?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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

<!-- Validates the form to archive an order based on user e-mail -->
<?php
if(isset($_POST["archive"])){
  $archiveemail = $_POST["email_archive"];
  $sql1 = "UPDATE carts SET name='Order Delivered' WHERE email='$archiveemail' AND name='Above order placed successfully'";
  mysqli_query($con,$sql1);
  echo '<script language="javascript">';
  echo 'window.location.replace("admin.php")';
  echo '</script>';
}


 ?>
