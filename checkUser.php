<?php

session_start();
$isLogged = false;
$username = '';

if(isset($_SESSION['name'])){
    $isLogged = true;
    $username = $_SESSION['name'];
    $uid = $_SESSION['uid'];
    
  // echo "<script>alert('".$_SESSION['name']."')</script>";
  // echo "<script>alert('".$_SESSION['uid']."')</script>";

}
