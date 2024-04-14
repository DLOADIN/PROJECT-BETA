<!-- DO NOT TOUCH THE PHP CODES THEY ARE CASE SENSITIVE -->
<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `admin` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginadmin.php');
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/system.css">
  <link rel="shortcut icon" href="./images/png-transparent-e-commerce-logo-logo-e-commerce-electronic-business-ecommerce-angle-text-service.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <title>COMPETITORS</title>
</head>
<body>
<div class="sidebar">
    <div class="logo"></div>
      <ul class="menu">
        <li>
          <a href="admindashboard.php">
            <i class="fa-solid fa-house"></i>
            <span>MAIN PAGE</span>
          </a>
        </li>
        <li>
          <a href="inputdata.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>INPUT DATA</span>
          </a>
        </li>
        <li>
          <a href="reporting.php">
            <i class="fa-solid fa-rectangle-list"></i>
            <span>REPORTING</span>
          </a>
        </li>
        <li>
          <a href="competitors.php">
            <i class="fa-solid fa-toggle-on"></i>
            <span>COMPETITORS</span>
          </a>
        </li>
        <li>
          <a href="informationcollected.php">
            <i class="fa-solid fa-message"></i>
            <span>DATA COLLECTION</span>
          </a>
        </li>
        <li>
          <a href="analysis.php">
            <i class="fa-solid fa-chart-simple"></i>
            <span>ANALYSIS</span>
          </a>
        </li>
        <li>
          <a href="datavisualization.php">
            <i class="fa-solid fa-envelope"></i>
            <span>DATA VISUALIZATION</span>
          </a>
        </li>
        <li>
          <a href="./site/home.php">
          <i class="fa-solid fa-table-cells-large"></i>
            <span>HOME SITE</span>
          </a>
        </li>
        <li>
          <a href="./USERS/admindashboard.php">
          <i class="fa-solid fa-user"></i>
            <span>USERS</span>
          </a>
        </li>
        <li class="logout">
          <a href="logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span>LOGOUT</span>
          </a>
        </li>
    </ul>
  </div>

  <div class="main-content">
    <div class="header-wrapper">
      <div class="header-title">
        <h2>PLEASE PROVIDE ACCURATE DATA</h2>
      </div>
      <div class="user-info">
      <img src="./images/Rwanda 🇷🇼.jpg" alt="">
      <div class="gango">
      <h3 class="my-account-header">Mr.Ndoba Hakim</h3>
      <p>Admin</p></div>  
      <button name="submit" type="submit" class="btn-3" >
        <a href="logout.php">LOGOUT</a>
      </button>
    </div>      
    
       </div>
       <div class="graded">
        <div class="graded-div">
        <h2>Information Collection</h2><button name="submit" type="submit" class="btn-2"><a href="./update/updatecompetitors.php">UPDATE RECORDS</a></button>
        </div>
        <form action="" method="post">

          <div class="real-form">
            <label for="">Company Name</label>
            <input type="text" name="u_companyname" placeholder="Name of The Company" required>
            <label for="">Market Value</label>
            <input type="number" name="u_marketvalue" placeholder="RWF" required>
          </div>

          <div class="real-form">
            <label for="">Market Price/Share </label>
            <input type="number" name="u_marketprice" placeholder="$$$" required>
            <label for="">Street Address</label>
            <input type="text" name="u_streetaddress" placeholder="Main Address" required>
          </div>
          <div class="real-form">
            <label for="">City</label>
            <input type="text" name="u_city" placeholder="Kigali, Rwanda" required>
            <label for="">Province</label>
            <input type="text" name="u_province" placeholder="Current Province" required>
          </div>
          <div class="real-form">
            <label for="">District</label>
            <input type="text" name="u_district" placeholder="Current District" required>
            
            <label for="">Cell</label>
            <input type="text" name="u_cell" placeholder="Current Cell" required>
          </div>
          <div class="real-form">
            <label for="">TODAY'S DATE</label>
            <input type="text" name="u_date" class="moon-walk" value="<?php echo date('Y-m-d')?>" readonly>
          </div>
          </div>
          <div class="checkbox">
            <input type="checkbox" name="" id="" required>
            <h3>I confirm that I have read and accepted the terms and conditions and privacy policy</h3>
          </div>
            <button name="submit" type="submit" class="btn-2" >SUBMIT</button>
        </form>
      </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./JS/js.js"></script>
</body>
</html>
<?php
  if(isset($_POST['submit'])){
    $u_companyname = $_POST['u_companyname'];
    $u_marketvalue= $_POST['u_marketvalue'];
    $u_marketprice= $_POST['u_marketprice'];
    $u_streetaddress = $_POST['u_streetaddress'];
    $u_city = $_POST['u_city'];
    $u_province = $_POST['u_province'];
    $u_district = $_POST['u_district'];
    $u_cell = $_POST['u_cell'];
    $date_field= date('Y-m-d',strtotime($_POST['u_date']));
    $sql=mysqli_query($con,"INSERT INTO `competitorinfo` VALUES('','$u_companyname ','$u_marketvalue',$u_marketprice,'$u_streetaddress','$u_city','$u_province','$u_district','$u_cell','$date_field')");
  }
?>