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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/system.css">
  <link rel="stylesheet" href="../CSS/beatdown.css">
  <link rel="shortcut icon" href="../images/png-transparent-e-commerce-logo-logo-e-commerce-electronic-business-ecommerce-angle-text-service.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <title>REPORTING  </title>
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
          <a href="reporting.php">
            <i class="fa-solid fa-rectangle-list"></i>
            <span>REPORTING</span>
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
          <a href="../site/home.php">
          <i class="fa-solid fa-table-cells-large"></i>
            <span>HOME SITE</span>
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

  <div class="main-content" style="height:fit-content">
    <div class="header-wrapper">
      <div class="header-title">
        <h2>DATA REPORT</h2>
      </div>
      <div class="user-info">
        <img src="../images/Rwanda 🇷🇼.jpg" alt="">
        <div class="gango">
        <h3 class="my-account-header">Mr.Ndoba Hakim</h3>
        <p>Admin</p></div>  
        <button name="submit" type="submit" class="btn-3" >
          <a href="logout.php">LOGOUT</a>
        </button>
      </div>        
       </div>
       <div class="filter">
        <table class="table">
    
          <div class="undivided">
          <h3 class="compete">COMPETITOR DETAILS</h3>
          <h3>FILTER COMPANY VALUE BY</h3>
          <form action="" method="get">
            <select name="u_marketvalue" id="">
              <option value="100000" 
              <?= isset($_GET['u_marketvalue']) == true ? ($_GET['u_marketvalue'] == '1000000' ? 'selected':'') :''?>>100,000+</option>
              <option value="100000" 
              <?= isset($_GET['u_marketvalue']) == true ? ($_GET['u_marketvalue'] == '1000000' ? 'selected':'') :''?>>1,000,000+</option>
              <option value="10,000,000"
              <?= isset($_GET['u_marketvalue']) == true ? ($_GET['u_marketvalue'] == '10000000' ? 'selected':'') :''?>>10,000,000+</option>
              <option value="100,000,000"
              <?= isset($_GET['u_marketvalue']) == true ? ($_GET['u_marketvalue'] == '100000000' ? 'selected':'') :''?>
              >100,000,000+</option>
            </select>
            <button type="submit" class="abtn-12">FILTER</button>
            <button type="submit" class="abtn-12">
        <a href="reporting.php">RESET</a>
            </button>
          </form></div></div>
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
            <th>PRINT</th>
          </tr>
          <tbody>
        <?php
            if(isset($_GET['u_marketvalue']) && $_GET['u_marketvalue'] != ''){
                  $marketvalue = validate($_GET['u_marketvalue']);
                  $sql=mysqli_query($con," SELECT * FROM competitorinfo WHERE u_marketvalue='$marketvalue' ORDER BY id DESC");
                }
                else{
                $sql=mysqli_query($con,"SELECT * FROM competitorinfo ORDER BY id DESC");
              }
              if($sql){
                if(mysqli_num_rows($sql) >0){
                  foreach($sql as $row){
            ?>
          <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['u_companyname']?></td>
            <td><?= $row['u_marketvalue']?></td>
            <td><?= $row['u_marketprice']?></td>
            <td><?= $row['u_streetaddress']?></td>
            <td><?= $row['u_city']?></td>
            <td><?= $row['u_province']?></td>
            <td><?= $row['u_district']?></td>
            <td><?= $row['u_cell']?></td>
            <td><button class="abtn-1" id="abtni-1">
              <a href="../pdf/competitorinfopdf.php">
              PRINT</a></button>
            <td>
            <?php
            }
          }
        }
            ?>
          </tr>
        </tbody></thead></table>
      </div>
      
     
        <div class="filter">
        <table class="table">
        <div class="undivided">
           <h3 class="compete">PRODUCT DETAILS</h3>
           <h3>FILTER BY</h3>
           <form action="" method="get">
            <select name="u_productname" id="" required>
              <option value="">PRODUCT</option>
              <option value="rice" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'rice' ? 'selected':'') :''?>>Rice</option>
              <option value="beans"
               <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'beans' ? 'selected':'') :''?>>Beans</option>
              <option value="cassava" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'cassava' ? 'selected':'') :''?>>Cassava</option>
              <option value="banana" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'banana' ? 'selected':'') :''?>>Bananas</option>
              <option value="cabbages" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'cabbages' ? 'selected':'') :''?>>Cabbages</option>
              <option value="sweet potatoes" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'sweet potatoes' ? 'selected':'') :''?>>Sweet Potatoes</option>  
              <option value="irish potatoes"
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'irish potatoes' ? 'selected':'') :''?>>Irish Potatoes</option>
              <option value="maize" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'maize' ? 'selected':'') :''?>>Maize</option>
            </select>
            <button type="submit" class="abtn-12" >FILTER</button>
            <button type="submit" class="abtn-12">
            <a href="reporting.php">RESET</a>
            </button>
          </form>
          <div>
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
            <th class="print">PRINT</th>
          </tr>
          <tbody>
          <!-- DO NOT TOUCH THE PHP CODES THEY ARE CASE SENSITIVE -->
        <?php
        function validate($input) {
        $validated_input = trim($input);
        return $validated_input;
            }
          
            if(isset($_GET['u_productname']) && $_GET['u_productname'] != ''){

              $productname = validate($_GET['u_productname']);
              $sql=mysqli_query($con," SELECT * FROM customerinfo WHERE u_productname='$productname' ORDER BY id DESC");
            }
            else{
            $sql=mysqli_query($con,"SELECT * FROM customerinfo ORDER BY id DESC");
          }
          if($sql){
            if(mysqli_num_rows($sql) >0){
              foreach($sql as $row){
            ?>
          <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['u_productname']?></td>
            <td><?= $row['u_currentprice']?></td>
            <td><?= $row['u_type']?></td>
            <td><?= $row['u_sector']?></td>
            <td><?= $row['u_geography']?></td>
            <td><?= $row['u_worth']?></td>
            <td><?= $row['u_revenue']?></td>
            <td><?= $row['u_socialmedia']?></td>
            <td><?= $row['u_priceaverage']?></td>
            <td><?= $row['u_marketshare']?></td>
            <td><?= $row['u_averageratings']?></td>
            <td><button class="abtn-1" id="abtni-1">
              <a href="../pdf/customerinfopdf.php">
              PRINT</a></button>
            <td>
            <?php
            }
          }
        }
            ?>
          </tr>
        </tbody></thead></table>
      </div> 

      
      <div class="filter">
        <table class="table">
        <div class="undivided">
           <h3 class="compete">OTHER PRODUCT DETAILS</h3>
           <h3>FILTER BY</h3>
           <form action="" method="get">
           <select name="u_productname" id="" required>
              <option value="">PRODUCT</option>
              <option value="rice" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'rice' ? 'selected':'') :''?>>Rice</option>
              <option value="beans"
               <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'beans' ? 'selected':'') :''?>>Beans</option>
              <option value="cassava" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'cassava' ? 'selected':'') :''?>>Cassava</option>
              <option value="banana" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'banana' ? 'selected':'') :''?>>Bananas</option>
              <option value="cabbages" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'cabbages' ? 'selected':'') :''?>>Cabbages</option>
              <option value="sweet potatoes" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'sweet potatoes' ? 'selected':'') :''?>>Sweet Potatoes</option>  
              <option value="irish potatoes"
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'irish potatoes' ? 'selected':'') :''?>>Irish Potatoes</option>
              <option value="maize" 
              <?= isset($_GET['u_productname']) == true ? ($_GET['u_productname'] == 'maize' ? 'selected':'') :''?>>Maize</option>
            </select>
            <button type="submit" class="abtn-12">FILTER</button>
            <button type="submit" class="abtn-12">
        <a href="reporting.php">RESET</a>
            </button>
          </form>
          <div>
        </thead>
          <tr>
            <th>#</th>
            <th>PRODUCT NAME</th>
            <th>CURRENT PRICE</th>
            <th>TYPE</th>
            <th>PRINT</th>
          </tr>
          <tbody>
            <?php
                if(isset($_GET['u_productname']) && $_GET['u_productname'] != ''){
                  $productname = validate($_GET['u_productname']);
                  $sql=mysqli_query($con," SELECT * FROM inputdata WHERE u_productname='$productname' ORDER BY id DESC");
                }
                else{
                $sql=mysqli_query($con,"SELECT * FROM inputdata ORDER BY id DESC");
              }
              if($sql){
                if(mysqli_num_rows($sql) >0){
                  foreach($sql as $row){
            ?>
          <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['u_productname']?></td>
            <td><?= $row['u_currentprice']?></td>
            <td><?= $row['u_type']?></td>
            <td><button class="abtn-1" id="abtni-1">
              <a href="../pdf/inputdatapdf.php">
              PRINT</a></button>
            <td>
            <?php
            }
          }}
            ?>
          </tr></tbody></thead>
        </table>
      </div> 
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>