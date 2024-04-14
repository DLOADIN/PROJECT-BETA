<?php
  require "../connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `user` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginuser.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/system.css">
  <link rel="stylesheet" href="../CSS/beatdown.css">
  <link rel="shortcut icon" href="../images/png-transparent-e-commerce-logo-logo-e-commerce-electronic-business-ecommerce-angle-text-service.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <title>USER DASHBOARD</title>
  <?php
  include "JS/js.php";
  include "JS/column.php";
  include "JS/next.php";
  include "JS/column2.php";
  include "../JS/column3.php";
  include "../JS/column4.php";
  ?>
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
          <a href="reporting.php">
            <i class="fa-solid fa-rectangle-list"></i>
            <span>REPORTING</span>
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

    <div class="main-content" id="main-content">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>Dashboard</h1>
        </div>
        <div class="user-info">
        <img src="../images/Rwanda 🇷🇼.jpg" alt="">
        <div class="gango">
        <h3 class="my-account-header">USER ONE</h3>
        <p></p></div>  
        <button name="submit" type="submit" class="btn-3" >
          <a href="logout.php">LOGOUT</a>
        </button>
      </div>        
         </div>
        <div class="fama" id="fama-dot">
        <h1>FIRST PREDICTION</h1>
        <form action="" method="get">
            <select name="u_productname" id="" required>
              <option value="">--SELECT PRODUCT--</option>
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
            </button>
          </form>
    <div id="barchart"></div>
</div>
        <div class="fama" id="fama-dot-2">
          <H1>SECOND PREDICTION</H1>
          <div id="chart_div"></div>
        </div>
         <div class="la-fama">
          <div class="fama" id="piechart_3d" >
          </div>
          <div class="fama" id="la-fama">
          <div class="filter">
      <div>
      <h1>USER DETAILS</h1>
        <table class="table" id="table">
        <thead>
          <tr>
            <th>#</th>
            <th>NAME</th>
            <th>EMAIL</th>
          </tr>
          <tbody>
            
        <?php
            $sql=mysqli_query($con,"SELECT * FROM `user` ");
            $row=mysqli_num_rows($sql);
            if($row){
              while($row=mysqli_fetch_array($sql)){
            ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['u_name']?></td>
            <td><?php echo $row['u_email']?></td>
            <?php
            }
          }
            ?>
          </tr>
        </tbody></thead>
      </table>
      </div>
        </div>
          </div>
          <div class="fama" id="columnchart_values">
          </div>
          <div class="fama" id="columnchart_material" >
          </div>
         </div>
        </div>

        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>