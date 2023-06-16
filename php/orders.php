<!-- Displays all the orders placed to the admin -->

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
    <title>Orders</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br>
    <nav>
      <ul>
       <li><a href="admin.php">Admin Dashboard</a></li>
       <li><a href="food.php">Menu</a></li>
       <li><a href="users.php">Users</a></li>
       <li><a href="orders.php">Orders</a></li>
      </ul>
    </nav><br>

    <?php // Displays all the orders to the admin for processing
    $sql = "SELECT * FROM carts";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) != 0){ ?>
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
      } ?> </table>
  <?php  }else{?>
      <h2>No orders to show...</h2>
  <?php  } ?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <footer>
      <div class="footercontent">
        All rights reserved. &#169;<br>
        This is a prototype restaurant online food ordering website, which enables users to order food and admin to view orders, add and delete items in menu, view customers, and also provides a basic idea of what customers order often, etc,.<br>
        We store customer information like username, e-mail, password, mobile no., and address. <br>
        While using this website you agree to our data storage, cookies, and privacy policy.<br>
        We store this data only to facilitate the user experience and do not intend to use it for any other irreleveant/inappropriate purposes.<br>
        The data is securely stored in our database.<br>
      </div>
    </footer>
  </body>
</html>
