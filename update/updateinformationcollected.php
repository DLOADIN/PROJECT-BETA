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
  <link rel="stylesheet" href="../CSS/fire.css">
  <link rel="shortcut icon" href="../images/png-transparent-e-commerce-logo-logo-e-commerce-electronic-business-ecommerce-angle-text-service.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
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
        <h3>UPDATE YOUR PRODUCT DETAILS</h3>
        <div class="filter">
        <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>PRODUCT NAME</th>
            <th>CURRENT PRICE</th>
            <th>TYPE</th>
            <th>SECTOR</th>
            <th>GEOGRAPHY</th>
            <th>WORTH</th>
            <th>REVENUE</th>
            <th>SOCIAL MEDIA</th>
            <th>PRICE AVERAGE</th>
            <th>MARKET SHARE</th>
            <th>AVERAGE RATINGS</th>
            <th>CREATED ON</th> 
            <th>UPDATE</th>
            <th>DELETE</th>
          </tr>
          <tbody>
          <!-- DO NOT TOUCH THE PHP CODES THEY ARE CASE SENSITIVE -->
        <?php
            $sql=mysqli_query($con,"SELECT * FROM customerinfo");
            $row=mysqli_num_rows($sql);
            if($row){
              while($row=mysqli_fetch_array($sql)){
            ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['u_productname']?></td>
            <td><?php echo $row['u_currentprice']?></td>
            <td><?php echo $row['u_type']?></td>
            <td><?php echo $row['u_sector']?></td>
            <td><?php echo $row['u_geography']?></td>
            <td><?php echo $row['u_worth']?></td>
            <td><?php echo $row['u_revenue']?></td>
            <td><?php echo $row['u_socialmedia']?></td>
            <td><?php echo $row['u_priceaverage']?></td>
            <td><?php echo $row['u_marketshare']?></td>
            <td><?php echo $row['u_averageratings']?></td>
            <td><?php echo $row['u_date']?></td>
            <td>
              <button class="abtn-10">
              <a href="updateinformationcollected.php?id=<?php echo $row['id']?>">
              UPDATE</a></button>
            </td>
            <td>
              <button class="abtn-20" onclick="alert('Are You Really Sure You Want To Delete This')"> <a href="deleteinformationcollected.php?id=<?php echo $row['id']?>">DELETE</a></button>
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
        $sql=mysqli_query($con,"SELECT * FROM `customerinfo` WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        ?>
        <form action="" method="POST">

          <div class="real-form">
            <label for="">Product Name</label>
            <input type="text" name="u_productname" value="<?php echo $row['u_productname']?>">
            <label for="">Current Price in RWF</label>
            <input type="number" name="u_currentprice" value="<?php echo $row['u_currentprice']?>">
          </div>

          <div class="real-form">
            <label for="">Industry/Sector</label>
            <input type="text" name="u_sector" value="<?php echo $row['u_sector']?>">
            <label for="">Products/Services</label>
            <input type="text" name="u_type" value="<?php echo $row['u_type']?>">
          </div>
          <div class="real-form">
            <label for="">Geographic Presence</label>
            <input type="text" name="u_geography" value="<?php echo $row['u_geography']?>">
            <label for="">Worth</label>
            <input type="number" name="u_worth" value="<?php echo $row['u_worth']?>">
          </div>
          <div class="real-form">
            <label for="">Revenues</label>
            <input type="number" name="u_revenue" value="<?php echo $row['u_revenue']?>">
            <label for="">Social Medias</label>
            <select name="u_socialmedia" id="" value="<?php echo $row['u_socialmedia']?>">
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
            <input type="number" name="u_priceaverage" value="<?php echo $row['u_priceaverage']?>">
            <label for="">Market Share</label>
            <input type="text" name="u_marketshare" value="<?php echo $row['u_marketshare']?>">
          </div>
          <div class="real-form">
            <label for="">Average Ratings</label>
            <input type="number" name="u_averageratings" value="<?php echo $row['u_averageratings']?>">
            <label for="">TODAY'S DATE</label>
            <input type="text" name="u_date" class="moon-walk" value="<?php echo $row['u_date']?>" readonly>
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
    $sql=mysqli_query($con,"UPDATE customerinfo SET u_productname = '$productname', u_currentprice='$currentprice',u_sector='$sector',u_type='$type',u_geography='$geography',u_worth='$worth',u_revenue='$revenue',u_socialmedia='$socialmedia',u_priceaverage='$priceaverage',u_marketshare='$marketshare',u_averageratings='$averagerating',u_date='$date_field' WHERE id='$id')");

    header('location:updateinformationcollected.php');
    
    if($sql){
     echo "<script>alert('PLEASE RELOAD THE PAGE IF YOU FIND ANY ERROR')</script>" ; 
    }
  }
?>