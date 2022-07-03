<?php 

include 'checkUser.php';

if($isLogged == true) {
   header('Location: index.php');
}

include 'connect.php';

error_reporting(0);

session_start();


if(isset($_POST['submit'])){
   $name = $_POST['name']; 
   $pass = $_POST['pass'];

   $sql = "SELECT * FROM users WHERE name='$name' AND pass='$pass'";
   $result = mysqli_query($conn, $sql);
   if($result->num_rows > 0){
      $row = mysqli_fetch_assoc($result);

      $_SESSION['name'] = $row['name'];
      $_SESSION['uid'] = $row['uid'];

      header("Location: index.php");
   }else{
      echo "<script>alert('Woops! Wrong username or password.')</script>";
   }


}

    


      
?>
<html>
    <head>
    <title>Login and Registration</title>
    <link rel="stylesheet" href="css/login.css">
    </head>
 <body>
    <div class="login-page">
    <div class="form">  
       

        <form class="login-form" action="" method="post">
        <input type="text" name="name" placeholder="user name" maxlength="15" minlength="3"  value="<?php echo $name; ?>" required/>
        <input type="password" name="pass" placeholder="password" minlength="6"  <?php echo $pass; ?> required/>
        <button name="submit">Login</button>
        <p class="message">Not Registered? <a href="register.php">Register</a></p>
        </form>
    </div>      
    </div>

    

     



 </body>    
</html>