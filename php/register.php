<!-- Registration for new customers -->

<?php
if(isset($_POST["nuser_register"])){
  $unamex = $_POST["nname"];
  $emailx = $_POST["nemail"];
  $passwordx = $_POST["npassword"];
  $mobilex = $_POST["nmobile"];
  $addressx = $_POST["naddress"];
  $con = mysqli_connect("localhost","root","","food");
  $sql = "SELECT * FROM users WHERE email = '$emailx'";
  $result = $con->query($sql);
  if($unamex == '' || $emailx == '' || $passwordx == '' || $mobilex == '' || $addressx == ''){
    mysqli_close($con);                                           //Checking whether all the fields are filled
    echo '<script language="javascript">';
    echo 'alert("Please fill all mandatory fields")';
    echo '</script>';
  }
  elseif(mysqli_num_rows($result) > 0){                  //To check whether user already exists
    mysqli_close($con);
    echo '<script language="javascript">';
    echo 'alert("User already exists. Try Log In.")';
    echo '</script>';
  }
  else{                                                  //To insert new user details in users table of food database
    $sql1 = "INSERT INTO users (uname,email,password,mobile,address)
     VALUES ('$unamex','$emailx','$passwordx','$mobilex','$addressx');";
    mysqli_query($con,$sql1);
    mysqli_close($con);
    echo '<script language="javascript">';
    echo 'window.location.replace("login.php")';
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
    <title>Register</title>
  </head>
  <body>
    <header>
      <img src="../images/jfflogo.png" alt="JFF Restaurant Logo" height="40" width="100">
      <img src="../images/jff-logo.png" alt="JFF LOGO" height="50" width="50" class="logo">
    </header><br>
    <nav>
      <ul>
       <li><a href="../index.html">Home</a></li>
       <li><a href="login.php">Order Now</a></li>
       <li><a href="../html/about.html">About</a></li>
       <li><a href="../html/contact.html">Contact Us</a></li>
       <li><a href="alogin.php">Admin</a></li>
      </ul>
    </nav><br>

    <!-- Form that allows new customers to enter their details -->
    <form class="" action="register.php" method="post">
      <fieldset>
        <p class="formtitle">Registration for newbies !</p>
        <label for="nname">Name         :  </label>
        <input type="text" id="nname" name="nname" placeholder="Enter your name..."><br><br><br>
        <label for="nemail">E-Mail      :  </label>
        <input type="text" id="nemail" name="nemail" placeholder="Enter your E-Mail ID..."><br><br><br>
        <label for="npassword">Password :  </label>
        <input type="password" id="npassword" name="npassword" placeholder="Enter your password..."><br><br><br>
        <label for="nmobile">Mobile No. :  </label>
        <input type="text" id="nmobile" name="nmobile" maxlength="10" placeholder="Enter your mobile no."><br><br><br>
        <label for="naddress">Address   :  </label>
        <input type="text" id="naddress" name="naddress" placeholder="Enter your address..."><br><br><br>
        <input type="submit" id="nuser_register" name="nuser_register" value="REGISTER">
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
