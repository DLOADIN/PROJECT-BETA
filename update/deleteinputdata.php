<?php
require "../connection.php";
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM inputdata WHERE id='$id'");
header('location:../inputdata.php');
?>