<!--Admin dashboard allows the admin to change menu, view orders, view users,etc. -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Jayenth Saravanakumar"/>
    <meta name ="language" content="EN"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../css/style.php' ?>
    <title>Admin Dashboard</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br>

    <!-- Navigation bar allows the admin to access various features available for the admin -->
    <nav>
      <ul>
       <li><a href="admin.php">Admin Dashboard</a></li>
       <li><a href="food.php">Menu</a></li>
       <li><a href="users.php">Users</a></li>
       <li><a href="orders.php">Orders</a></li>
      </ul>
    </nav><br>

    <!--Admin logout allows the admin to logout-->
    <div class="login_header">
      <?php echo "Welcome Admin <br><br>" ?>
      <form action="admin.php" method="post">
        <input class="logout_button" type="submit" name="logout" value="LOGOUT">
      </form>
    </div>
    <div class="b">

      <!-- Allows admin to insert new item in the menu -->
      <h4>Insert a new item into the menu</h4>
      <form class="" action="insert.php" method="post">
        <input type="submit" id="admin_insert" name="admin_delete" value="Insert New Item">
      </form><br><br>

      <!-- Allows admin to delete an existing item from the menu -->
      <h4>Delete an existing item from the menu</h4>
      <form class="" action="delete.php" method="post">
        <input type="submit" id="admin_delete" name="admin_delete" value="Delete Existing Item">
      </form><br><br>

      <!-- Allows admin to archive an order that's delivered -->
      <h4>Archive an order</h4>
      <form class="" action="archive.php" method="post">
        <input type="submit" id="admin_cart" name="admin_cart" value="Archive an order">
      </form>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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

<?php //Validates the logout request of admin
if(isset($_POST["logout"])){
  session_start();
  session_destroy();
  echo '<script language="javascript">';
  echo 'window.location.replace("../html/logout.html")';
  echo '</script>';
}

?>
