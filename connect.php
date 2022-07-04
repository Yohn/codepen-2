<?php
 
$server = "remotemysql.com:3306";
$user = "K1QcMb0Ve2";
$password = "RMlqXuCutM";
$database = "K1QcMb0Ve2";

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn){
    echo "<script>alert('connection failed')</script>";
}


?>

