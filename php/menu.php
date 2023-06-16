<!-- Displays menu to the users after they are logged in successfully -->

<?php
    session_start();
    $con = mysqli_connect("localhost","root","","food");

    // Validates the add submit button for each item in the menu
    if (isset($_POST["add"])){
      $email = $_SESSION["lemail"];
      $name1 = $_POST["hidden_name"];
      $quantity1 = $_POST["quantity"];
      $price1 = $_POST["hidden_price"];
      $sql1 = "INSERT INTO carts (email,name,quantity,price,address)
      VALUES ('$email','$name1','$quantity1','$price1','nil');";         //Inserts item selected to carts table in food database
      mysqli_query($con,$sql1);
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_POST["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="menu.php"</script>';
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }

    }

    if (isset($_GET["action"])){                              //Deletes selected item from cart
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    session_start();
                    $email = $_SESSION["lemail"];
                    $sql3 = "INSERT INTO carts (email,name,price,quantity,address) VALUES ('$email','Above order deleted','$total','nil','nil');";  //Inserts to show the admin that the order is deleted
                    mysqli_query($con,$sql3);
                    unset($_SESSION["cart"][$keys]);
                    echo '<script language="javascript">';
                    echo '<script>alert("Cart has been emptied...!")</script>';
                    echo '<script>window.location="menu.php"</script>';
                }
            }
        }
    }

  if(isset($_POST['checkout'])){
    $email = $_SESSION["lemail"];
    $sql5 = "SELECT * FROM carts WHERE email = '$email' AND name = 'Above order placed successfully' ";  //Selects row by matching user email and name
    $result5 = $con->query($sql5);
    if(mysqli_num_rows($result5) > 0){                                                                 //Checks whether the user already has an order placed
      echo '<script language="javascript">';
      echo '<script>alert("You already have a pending order. Please wait !")</script>';               //Alerts the customer if they already have an order placed
      echo '</script>';
    }
    else{
      $total = $_SESSION["total"];                           //Inserts to show that the order is successfully placed
      $sql2 = "INSERT INTO carts (email,name,quantity,price) VALUES ('$email','Above order placed successfully','nil','$total');";
      mysqli_query($con,$sql2);
      echo '<script language="javascript">';
      echo 'window.location.replace("pay.php")';            //Redirects the user to the payment section
      echo '</script>';
    }
  }


	 ?>


<html>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Jayenth Saravanakumar"/>
    <meta name ="language" content="EN"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../css/style.php' ?>
		<title>Menu</title>
	</head>
	<body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br>

      <!-- Login header gives email id of user logged in using session -->
      <div class="login_header">
        <a href="profile.php" class="logname"><?php echo "Logged in as  ".$_SESSION["lemail"]."" ?></a>

        <!-- Form with logout button to allow user to logout -->
        <form action="menu.php" method="post">
          <input type="submit" class="logout_button" name="menulogout" value="LOGOUT">
        </form>
      </div><br><br><br>

      <button onclick="topFunction()" id="myBtn" title="Go to cart">
   <img src="../images/cart.png" alt="Cart" height="30" width="30">
 </button>

      <!-- Allows users to search for a particular item in the menu -->
			<h2>Search your favourites here</h2>
      <form class="" action="menu.php" method="post">
        <input type="text" name="food_name" placeholder="Enter food item ...">
        <input type="submit" name="food_search" value="Search">
      </form>

			<?php  //Validates the food search form to display the item requested by user
      if(isset($_POST["food_search"])){
        $name = $_POST["food_name"] ?>
          <div class="container">
      			<h2>Your favourite ...</h2>
      			<?php
      			$sql = "SELECT * FROM foodlist WHERE name LIKE '%$name%'";   //Selects specific item from the menu requested by user
      			$result = mysqli_query($con,$sql);
      			if(mysqli_num_rows($result ) > 0){
      				while($row = mysqli_fetch_array($result)){
      					?>
      					<div class="foodbox">
      						<form class="" " method="post" action="menu.php?action=add&id=<?php echo $row['id']; ?>" >
      							<div class="">
      								<img src="<?php echo $row["image"]; ?>" alt="Food item image" width="100" height="70">
      								<h4><?php echo $row["name"]; ?></h4>
      								<h4>Category :<?php echo $row["category"]; ?></h4>
      								<h4><?php echo $row["description"]; ?></h4>
      								<h3>Rs. <?php echo $row["price"]; ?></h3>
      								<input type="text" name="quantity" value="1">
      								<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
      								<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
      								<input type="submit" name="add" value="Add">
      							</div>
      						</form>
      					</div>
      					<?php
      				}
      			}else{?>
              <h4>Sorry...currently unavailable</h4>
              <?php
            }
      			 ?>
      		</div>
        <?php } ?>

          <div class="container">
      			<h2>Our Menu</h2>
            <?php
      			$sql = "SELECT * FROM foodlist";
      			$result = mysqli_query($con,$sql);
      			if(mysqli_num_rows($result ) > 0){
      				while($row = mysqli_fetch_array($result)){
                ?>
      					<div class="foodbox">
      						<form class="" method="post" action="menu.php?action=add&id="<?php echo $row['id']; ?> " >
      							<div class="">
      								<img src="<?php echo $row["image"]; ?>" alt="Food item image" width="100" height="70">
      								<h4><?php echo $row["name"]; ?></h4>
      								<h4>Category :<?php echo $row["category"]; ?></h4>
      								<h4><?php echo $row["description"]; ?></h4>
      								<h3>Rs. <?php echo $row["price"]; ?></h3>
      								<input type="text" name="quantity" value="1">
      								<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
      								<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
      								<input type="submit" name="add" value="Add">
      							</div>
      						</form>
      					</div>
      					<?php
      				}
      			}
      			 ?>
      		</div>


          <!-- Box details showing items added to box -->
          <div style="clear: both"></div>
          <h3 class="title2">In your cart</h3>
          <div class="table-responsive">
              <table id="cart">
              <tr>
                  <th width="30%">Item Name</th>
                  <th width="10%">Quantity</th>
                  <th width="13%">Price</th>
                  <th width="10%">Total Price</th>
                  <th width="17%">Remove Item</th>
              </tr>

              <?php
                  if(!empty($_SESSION["cart"])){
                      $total = 0;
                      foreach ($_SESSION["cart"] as $key => $value) {
                          ?>
                          <tr>
                              <td><?php echo $value["item_name"]; ?></td>
                              <td><?php echo $value["item_quantity"]; ?></td>
                              <td>Rs. <?php echo $value["product_price"]; ?></td>
                              <td>
                                  Rs. <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                              <td><a href="menu.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                          class="text-danger">Empty Cart</span></a></td>

                          </tr>
                          <?php
                          $total = $total + ($value["item_quantity"] * $value["product_price"]);
                      }$_SESSION["total"] = $total;
                          ?>
                          <tr>
                              <td colspan="3" align="right">Total</td>
                              <th align="right">Rs. <?php echo number_format($total, 2); ?></th>
                              <td></td>
                          </tr>
                          <?php
                      }
                  ?>
              </table>
          </div>

          </div>
          <form action="menu.php" method="post">
            <input type="submit" id="checkout" name="checkout" value="Proceed to pay">
          </form><br><br><br><br><br>




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

          <?php   //Validates the logout request by user and redirects to logout page
          if(isset($_POST["menulogout"])){
            $email = $_SESSION["lemail"];
            session_start();
            $sql4 = "INSERT INTO carts (email,name,price,quantity,address) VALUES ('$email','Above order deleted','$total','nil','nil');";   //Inserts statement for the admin to recognise the order
            mysqli_query($con,$sql4);
            unset($_SESSION["cart"]);
            unset($_SESSION["lemail"]);
            unset($_SESSION["total"]);
            session_destroy();
            echo '<script language="javascript">';
            echo 'window.location.replace("../html/logout.html")';
            echo '</script>';
          }
          ?>



          <?php
        echo '<script language="javascript">';
        echo 'var mybutton = document.getElementById("myBtn");

   window.onscroll = function() {scrollFunction()};

   function scrollFunction() {
     if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
       mybutton.style.display = "block";
     } else {
       mybutton.style.display = "none";
     }
   }

   function topFunction() {
     document.body.scrollTop = 2700;
     document.documentElement.scrollTop = 2700;
   }
   ';
        echo '</script>';

         ?>
