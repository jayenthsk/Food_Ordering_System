<!-- Displays all the users who have registered to the admin -->

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
    <title>Users</title>
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

    <!-- Search bar form allowing admin to search for a particular user -->
    <h2>Search a user here</h2>
    <form class="" action="users1.php" method="post">
      <input type="text" name="user_email" placeholder="Enter user email here...">
      <input type="submit" name="users_search" value="Search">
    </form><br><br>
    <?php
    if(isset($_POST["users_search"])){
      $email = $_POST["user_email"];
      $sql1 = "SELECT * FROM users WHERE email LIKE '%$email'";  //Selects the particular user from users table in database
      $result1 = mysqli_query($con,$sql1);
      if(mysqli_num_rows($result1) != 0){
        while($row = mysqli_fetch_array($result1)){?>
          <table id="user">
            <tr>
              <th>Name</th>
              <th>E-Mail</th>
              <th>Mobile</th>
              <th>Address</th>
            </tr>
            <tr>
              <td><?php echo $row['uname']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['mobile']; ?></td>
              <td><?php echo $row['address']; ?></td>
            </tr>
          </table>
          <?php
        }
      }else{?>                                      <!-- Display no user found if user email is not present in users table of database -->
        <h3>No user found !</h3><br><br><br>
    <?php  }
  }

     $sql = "SELECT * FROM users";                  //Selects all users from users table in database
     $result = mysqli_query($con,$sql);
     if(mysqli_num_rows($result) > 0){?>
       <table id="user">
         <tr>
           <th>Name</th>
           <th>E-Mail</th>
           <th>Mobile</th>
           <th>Address</th>
         </tr>
       <?php while($row = mysqli_fetch_array($result)){ ?>
           <tr>
             <td><?php echo $row['uname']; ?></td>
             <td><?php echo $row['email']; ?></td>
             <td><?php echo $row['mobile']; ?></td>
             <td><?php echo $row['address']; ?></td>
           </tr>
      <?php }
     } ?></table>
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
