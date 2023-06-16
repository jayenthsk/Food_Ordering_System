<!-- Displays the menu to the admin -->

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
		<title>Food List</title>
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

    <!-- Form that allows admin to search for a particular item in the menu -->
    <h2>Search for a specific item here</h2>
    <form class="" action="food.php" method="post">
      <input type="text" name="food_name" placeholder="Enter food item ...">
      <input type="submit" name="food_search" value="Search">
    </form>

    <!-- Code to display the item admin searched for -->
    <?php
    if(isset($_POST["food_search"])){
      $name = $_POST["food_name"] ?>
        <div class="container">
          <h2>Your search ...</h2>
          <?php
          $sql = "SELECT * FROM foodlist WHERE name LIKE '%$name%'";
          $result = mysqli_query($con,$sql);
          if(mysqli_num_rows($result ) > 0){
            while($row = mysqli_fetch_array($result)){
              ?>
              <div class="foodbox">
                  <div class="">
                    <img src="<?php echo $row["image"]; ?>" alt="Food item image" width="100" height="70">
                    <h4><?php echo $row["name"]; ?></h4>
                    <h4>Category :<?php echo $row["category"]; ?></h4>
                    <h4><?php echo $row["description"]; ?></h4>
                    <h3>Rs. <?php echo $row["price"]; ?></h3>
                  </div>
              </div>
              </div>
              <?php
            }
          }else{?>
            <h4>Sorry...currently unavailable</h4>
            <?php
          }
           ?>
      <?php } ?>

        <!-- Displays all the items in menu -->
        <div class="container">
          <h2>Menu</h2>
          <?php
          $sql = "SELECT * FROM foodlist";
          $result = mysqli_query($con,$sql);
          if(mysqli_num_rows($result ) > 0){
            while($row = mysqli_fetch_array($result)){
              ?>
              <div class="foodbox">
                  <div class="">
                    <img src="<?php echo $row["image"]; ?>" alt="Food item image" width="100" height="70">
                    <h4><?php echo $row["name"]; ?></h4>
                    <h4>Category :<?php echo $row["category"]; ?></h4>
                    <h4><?php echo $row["description"]; ?></h4>
                    <h3>Rs. <?php echo $row["price"]; ?></h3>
                  </div>
              </div>
              <?php
            }
          }
           ?>
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
