<!-- Allows users to login if they have already registered and takes them to menu for ordering -->

<!-- Validates the login credentials -->
<?php
if(isset($_POST["user_login"])){
session_start();
  $con = mysqli_connect("localhost","root","","food");
  $email = $_POST["user_email"];
  $password = $_POST["user_password"];
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $sql1 = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = $con->query($sql);
  if(mysqli_num_rows($result) > 0){                   //Checks whether user has registered in the database
    $result1 = $con->query($sql1);
    if(mysqli_num_rows($result1) > 0){               //Checks whether the user has entered the correct password
      if(!empty($_POST["remember"])) {
	    setcookie ("username",$_POST["user_email"],time()+ 3600);        //Sets cookies for user email if the user has checked remember me
      } else {
    	setcookie("username","");
     }
      while ($row = mysqli_fetch_array($result1)){
        $address = $row["address"];
      $_SESSION['lname'] = $row['uname'];
      $_SESSION['lemail'] = $_POST['user_email'];   //Sets session for user email for future use
      $_SESSION['laddress'] = $address;
      echo '<script language="javascript">';
      echo 'window.location.replace("menu.php")';
      echo '</script>';
    }
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Password Incorrect")';          //Alerts if password is incorrect
      echo '</script>';
    }
  }
  else{
    echo '<script language="javascript">';
    echo 'window.location.replace("register.php")';    //Redirects to registration for new customers if user email does not exist in database
    echo '</script>';
  }
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
    <title>Login</title>
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

    <!-- Form that allows users to login by entering email and password -->
    <form class="" action="login.php" method="post">
      <fieldset>
        <p class="formtitle">Login Details</p><br><br>
        <label for="user_email">E-Mail   :  </label>           <!-- Auto fills user email from cookies stored -->
        <input type="text" id="user_email" name="user_email" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" placeholder="Enter e-mail..."><br><br><br>
        <label for="user_password">Password :  </label>
        <input type="password" id="user_password" name="user_password" placeholder="Enter password..."><br><br><br>

        <!-- Check-box that allows users to allow/disallow cookies -->
        <label for="remember">Remember Me</label>
        <input type="checkbox" id="remember" name="remember" value="Remember Me">
        <br><br><br>
        <input type="submit" id="user_login" name="user_login" value="LOGIN"><br><br><br>
        <a href="register.php">New to JFF ? Register Now</a>
      </fieldset>
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
