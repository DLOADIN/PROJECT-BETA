<!-- DO NOT TOUCH THE PHP CODES THEY ARE CASE SENSITIVE -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/loginregistration.css">
  <link rel="shortcut icon" href="./images/png-transparent-e-commerce-logo-logo-e-commerce-electronic-business-ecommerce-angle-text-service.png" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
  <title>REGISTER PAGE</title>
</head>
<body>
  <div class="grided">
    <div class="grid-1">
      <div class="text">
        <h1>WELCOME</h1>
        <p>To Keep connected with us please<br>
        login with your personal info</p>
      </div>
      <button class="btn">
        <a href="loginadmin.php">SIGN IN</a>
        </button>
    </div>
    <div class="grid-2">
      <div class="text-1">
        <h1>Create An Account</h1>
        <form action="" method="post">
          
          <div class="inputbox">
          <ion-icon name="people-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">NAME</label></div>

          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="u_email" required>
          <label for="">E-MAIL</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>

          <button name="submit" type="submit" class="btn-2">SIGN UP</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
  require 'connection.php';
  
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"INSERT INTO `admin` VALUES('','$name','$email','$password')");
    
    if($sql){
      echo "<script>alert('Registered Successfully| Please Head to the Login ')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>
