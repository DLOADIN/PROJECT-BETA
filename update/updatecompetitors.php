<!-- DO NOT TOUCH THE PHP CODES THEY ARE CASE SENSITIVE -->
<?php
  require "../connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `admin` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginadmin.php');
  } 
  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/system.css">
  <link rel="shortcut icon" href="../images/png-transparent-e-commerce-logo-logo-e-commerce-electronic-business-ecommerce-angle-text-service.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS/fire.css">
  <title>SHARE INFORMATION</title>
</head>
<body>
<div class="sidebar">
    <div class="logo"></div>
      <ul class="menu">
        <li>
          <a href="../admindashboard.php">
            <i class="fa-solid fa-house"></i>
            <span>MAIN PAGE</span>
          </a>
        </li>
        <li>
          <a href="../inputdata.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>INPUT DATA</span>
          </a>
        </li>
        <li>
          <a href="../reporting.php">
            <i class="fa-solid fa-rectangle-list"></i>
            <span>REPORTING</span>
          </a>
        </li>
        <li>
          <a href="../competitors.php">
            <i class="fa-solid fa-toggle-on"></i>
            <span>COMPETITORS</span>
          </a>
        </li>
        <li>
          <a href="../informationcollected.php">
            <i class="fa-solid fa-message"></i>
            <span>DATA COLLECTION</span>
          </a>
        </li>
        <li>
          <a href="../analysis.php">
            <i class="fa-solid fa-chart-simple"></i>
            <span>ANALYSIS</span>
          </a>
        </li>
        <li>
          <a href="../datavisualization.php">
            <i class="fa-solid fa-envelope"></i>
            <span>DATA VISUALIZATION</span>
          </a>
        </li>
        <li>
          <a href="../site/home.php">
          <i class="fa-solid fa-table-cells-large"></i>
            <span>HOME SITE</span>
          </a>
        </li>
        <li class="logout">
          <a href="../logout.php">
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
        <div class="graded">
        <div class="graded-div">
      </div>
        <h3>UPDATE YOUR COMPETITOR DETAILS</h3>
        <div class="filter">
        <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>COMPANY NAME</th>
            <th>MARKET VALUE</th>
            <th>MARKET PRICE</th>
            <th>STREET ADDRESS</th>
            <th>CITY</th>
            <th>PROVINCE</th>
            <th>DISTRICT</th>
            <th>CELL</th>
            <th>CREATED ON</th>
            <th>UPDATE</th>
            <th>DELETE</th>
          </tr>
          <tbody>
            
        <?php
            $sql=mysqli_query($con,"SELECT * FROM competitorinfo");
            $row=mysqli_num_rows($sql);
            if($row){
              while($row=mysqli_fetch_array($sql)){
            ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['u_companyname']?></td>
            <td><?php echo $row['u_marketvalue']?></td>
            <td><?php echo $row['u_marketprice']?></td>
            <td><?php echo $row['u_streetaddress']?></td>
            <td><?php echo $row['u_city']?></td>
            <td><?php echo $row['u_province']?></td>
            <td><?php echo $row['u_district']?></td>
            <td><?php echo $row['u_cell']?></td>
            <td><?php echo $row['u_date']?></td>
            <td>
              <button class="abtn-1">
              <a href="updatecompetitors.php?id=<?php echo $row['id']?>">
              UPDATE</a></button>
            </td>
            <td>
              <button class="abtn-2" onclick="alert('Are You Really Sure You Want To Delete This')"> <a style="color:red" href="deletecompetitors.php?id=<?php echo $row['id']?>">DELETE</a></button>
            </td>
            <?php
            }
          }
            ?>
          </tr>
        </tbody></thead></table>
      </div> 
        <?php
        if(isset($_GET['id'])){
        $id=$_GET['id'];
        }
        $sql=mysqli_query($con,"SELECT * FROM competitorinfo WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        ?>
        <form action="" method="post">

<div class="real-form">
  <label for="">Company Name</label>
  <input type="text" name="u_companyname" value="<?php echo $row['u_companyname']?>">
  <label for="">Market Value</label>
  <input type="number" name="u_marketvalue" value="<?php echo $row['u_marketvalue']?>">
</div>

<div class="real-form">
  <label for="">Market Price/Share </label>
  <input type="number" name="u_marketprice" value="<?php echo $row['u_marketprice']?>">
  <label for="">Street Address</label>
  <input type="text" name="u_streetaddress" value="<?php echo $row['u_streetaddress']?>">
</div>
<div class="real-form">
  <label for="">City</label>
  <input type="text" name="u_city" value="<?php echo $row['u_city']?>">
  <label for="">Province</label>
  <input type="text" name="u_province" value="<?php echo $row['u_province']?>">
</div>
<div class="real-form">
  <label for="">District</label>
  <input type="text" name="u_district" value="<?php echo $row['u_district']?>">
  
  <label for="">Cell</label>
  <input type="text" name="u_cell" value="<?php echo $row['u_cell']?>">
</div>
    <div class="real-form">
    <label for="">TODAY'S DATE</label>
    <input type="text" name="u_date" class="moon-walk" value="<?php echo $row['u_date']?>" readonly>
    </div>
<div class="checkbox">
  <input type="checkbox" name="" id="" required>
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
    $sql=mysqli_query($con,"UPDATE customerinfo SET u_productname = '$productname', u_currentprice='$currentprice',u_sector='$sector',u_type='$type',u_geography='$geography',u_worth='$worth',u_revenue='$revenue',u_socialmedia='$socialmedia',u_priceaverage='$priceaverage',u_marketshare='$marketshare',u_averageratings='$averagerating', u_date='$date_field' WHERE id='$id')");

    header('location:updateinformationcollected.php');
    
    if($sql){
     echo "<script>alert('PLEASE RELOAD THE PAGE IF YOU FIND ANY ERROR')</script>" ; 
    }
  }
?>