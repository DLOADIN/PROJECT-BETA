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
  <link rel="stylesheet" href="./CSS/beatdown.css">
  <link rel="shortcut icon" href="./images/png-transparent-e-commerce-logo-logo-e-commerce-electronic-business-ecommerce-angle-text-service.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
  include "JS/js.php";
  include "JS/column.php";
  include "JS/next.php";
  include "JS/column2.php";
  ?>
  <title>ANALYSIS</title>
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
        <h2>ANALYSIS PREDICTION</h2>
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
       <div class="tabular-wrapper" style="height: fit-content;">
        <div class="big-chopper">
          <div class="alerted-perl"></div>
          <h3>These </h3><h3 class="red-head">charts</h3> <h3>show the prediction of the upcoming prices based on the current prices on the market</h3>
        </div>
      
        <div class="la-fama">
          <div class="fama" id="piechart_3d" >
          </div>
          
          <div class="fama" id="columnchart_values">
          </div>
         </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>