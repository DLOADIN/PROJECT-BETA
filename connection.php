<?php
  session_start();
  $con=mysqli_connect('localhost','root','','competitorsystem');

  if (!$con){
  die (mysqli_error($con));
}
?>