<!-- Displays user profile in the type of a form which also enables editing -->

<?php
session_start();
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
    <title>Profile</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br>

    <!-- Login header gives email id of user logged in using session -->
    <div class="login_header">
      <?php echo "Logged in as  ".$_SESSION["lemail"]."" ?>

      <!-- Form with back to menu button -->
      <form action="profile.php" method="post">
        <input type="submit" class="logout_button" name="back_to_menu" value="Back to Menu">
      </form>
    </div>

<?php
     $email = $_SESSION["lemail"];
     $sql = "SELECT * FROM users WHERE email = '$email'";
     $result = mysqli_query($con,$sql);
     if(mysqli_num_rows($result) > 0){
       while($row = mysqli_fetch_array($result)){ ?>

        <!-- Form that allows customer to update their details -->
        <form class="" action="profile.php" method="post">
          <fieldset>
            <p class="formtitle">Your Profile</p>
            <p>Alter a form field and press 'UPDATE PROFILE' to update your profile.</p>
            <img src="../images/profile.png" alt="Profile Picture" height="250" width="200"><br><br>
            <label for="uname">Name :</label>
            <input type="text" id="uname" name="uname" value="<?php echo $row["uname"]; ?>"> <br><br><br>
            <label for="mobile">Mobile :</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo $row["mobile"]; ?>"> <br><br><br>
            <label for="address">Address :</label>
            <input type="text" id="address" name="address" value="<?php echo $row["address"]; ?>"> <br><br><br><br>
            <input type="submit" id="profile" name="profile" value="UPDATE PROFILE">
          </fieldset>
        </form>
    <?php } } ?>
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


<?php
if(isset($_POST["profile"])){
  $email = $_SESSION["lemail"];
  $unamex = $_POST["uname"];
  $mobilex = $_POST["mobile"];
  $addressx = $_POST["address"];
  $sql1 = "UPDATE users SET uname = '$unamex', mobile = '$mobilex', address = '$addressx' WHERE email = '$email' ;";
  mysqli_query($con,$sql1);
  echo '<script language="javascript">';  //Alerts the customer that their profile is updated
  echo 'window.location.replace("profile.php")';
  echo '</script>';
  echo '</script>';
}

if(isset($_POST["back_to_menu"])){
  echo '<script language="javascript">';
  echo 'window.location.replace("menu.php")';                 //Redirects to order menu page
  echo '</script>';
}

 ?>
