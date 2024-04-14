<?php
require "../connection.php";
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM customerinfo WHERE id='$id'");
header('location:updateinformationcollected.php');
?>