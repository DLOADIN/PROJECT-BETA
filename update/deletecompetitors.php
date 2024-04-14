<?php
require "../connection.php";
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM competitorinfo WHERE id='$id'");
header('location:updatecompetitors.php');
?>