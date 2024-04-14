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
  <title>SHARE INFORMATION</title>
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
        <h2>Information Collection</h2><button name="submit" type="submit" class="btn-2"><a href="./update/updateinformationcollected.php">UPDATE RECORDS</a></button>
        </div>
        <form action="" method="POST">

          <div class="real-form">
            <label for="">Product Name</label>
            <input type="text" name="u_productname" placeholder="Product Name" maxlength="" required>
            <label for="">Current Price in RWF</label>
            <input type="number" name="u_currentprice" placeholder="RWF" maxlength="9" required>
          </div>

          <div class="real-form">
            <label for="">Industry/Sector</label>
            <input type="text" name="u_sector" placeholder="Sector" required>
            <label for="">Products/Services</label>
            <input type="text" name="u_type" placeholder="Product Type" required>
          </div>
          <div class="real-form">
            <label for="">Geographic Presence</label>
            <input type="text" name="u_geography" placeholder="Kigali, Rwanda" required>
            <label for="">Worth</label>
            <input type="number" name="u_worth" placeholder="Company Worth" maxlength="9" required>
          </div>
          <div class="real-form">
            <label for="">Revenues</label>
            <input type="number" name="u_revenue" placeholder="Revenues" maxlength="9" required>
            <label for="">Social Medias</label>
            <select name="u_socialmedia" id="">
              <option value=""></option>
              <option value="FACEBOOK">FACEBOOK</option>
              <option value="TWITTER">TWITTER</option>
              <option value="TIKTOK">TIKTOK</option>
              <option value="INSTAGRAM">INSTAGRAM</option>
              <option value="LINKED IN">LINKED IN</option>
            </select>
          </div>
          <div class="real-form">
            
            <label for="">Price Average</label>
            <input type="number" name="u_priceaverage" placeholder="Average Price" required>
            <label for="">Market Share</label>
            <input type="text" name="u_marketshare" placeholder="Percentage" required>
          </div>
          <div class="real-form">
            <label for="">Average Ratings</label>
            <input type="number" name="u_averageratings" placeholder="Average Ratings" required>
            <label for="">TODAY'S DATE</label>
            <input type="text" name="u_date" class="moon-walk" value="<?php echo date('Y-m-d')?>" readonly>
          </div>
          <div class="checkbox">
          <input type="checkbox" name="checkbox" id="" required>
          <h3>I confirm that I have read and accepted the terms and conditions and privacy policy</h3>
        </div>
            <button name="submit" type="submit" class="btn-2" >SUBMIT</button>
        </form>
      </div>
      </div>
      </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./JS/js.js"></script>
</body>
</html>
<?php
  if(isset($_POST['submit'])){
    $productname = $_POST['u_productname'];
    $currentprice= $_POST['u_currentprice'];
    $sector = $_POST['u_sector'];
    $type = $_POST['u_type'];
    $geography = $_POST['u_geography'];
    $worth = $_POST['u_worth'];
    $revenue = $_POST['u_revenue'];
    $socialmedia = $_POST['u_socialmedia'];
    $priceaverage = $_POST['u_priceaverage'];
    $marketshare = $_POST['u_marketshare'];
    $averagerating = $_POST['u_averageratings'];
    $date_field= date('Y-m-d',strtotime($_POST['u_date']));
    $sql=mysqli_query($con,"INSERT INTO `customerinfo` VALUES('','$productname','$currentprice','$sector','$type','$geography','$worth','$revenue','$socialmedia','$priceaverage','$marketshare','$averagerating','$date_field')");
  }
?>