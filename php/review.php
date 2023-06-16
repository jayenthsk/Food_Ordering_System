<!-- Page displaying all the reviews to customers and visitors of the site -->

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
    <title>Reviews</title>
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


    <form class="" action="review.php" method="post">
      <fieldset>
        <p class="formtitle">Just tell everyone...</p>
        <label for="name">Name :</label>
        <input type="text" id="name" name="name"><br>
        <label for="review">Write here :</label>
        <input type="text" id="review" name="review"><br>
        <input type="submit" id="review_submit" name="review_submit" value='POST'>
      </fieldset>
    </form><br><br>

    <?php // Displays all the reviews to customers
    $sql = "SELECT * FROM feedback";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) != 0){ ?>
        <table id="review">
          <?php while($row = mysqli_fetch_array($result)){ ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['review']; ?></td>
          </tr>
        <?php
      } ?> </table> <?php
    } ?> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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

<!-- Form validation inserts name and review of customer into feedback table of food database -->
<?php
if(isset($_POST["review_submit"])){
  $name = mysqli_real_escape_string($con,$_POST["name"]);
  $review = mysqli_real_escape_string($con,$_POST["review"]);
  $sql = "INSERT INTO feedback (name,review) VALUES ('$name','$review');";
  mysqli_query($con,$sql);
  mysqli_close($con);
  echo '<script language="javascript">';
  echo 'window.location.replace("review.php")';            
  echo '</script>';
}

 ?>
