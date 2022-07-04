<?php
include 'checkUser.php';

if($isLogged == true) {
    header('Location: index.php');
}

include 'connect.php';

error_reporting(0);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE name='$name' OR email='$email'";
    $result = mysqli_query($conn, $sql);

    if(!$result->num_rows > 0){
      $sql = "INSERT INTO users (name, email, pass) VALUES ('$name', '$email', '$pass')";
      $result = mysqli_query($conn, $sql);

      if ($result){
          echo "<script>alert('Wow! User Registration Completed.')</script>";
          session_start();
          $_SESSION['username'] = $name;

          header("Location: index.php");

      } else {
          echo "<script>alert('Woops! Something Went Wrong.')</script>";
      }
  } else{
    echo "<script>alert('Woops Username/Email Already Exists.')</script>";
  }
}


?>


<html>
    <head>
    <title>Login and Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    </head>
 <body>
    <div class="login-page">
    <div class="form">  
        <form class="register-form" action="" method="post">
        <input type="text" name="name" placeholder="user name" maxlength="15" minlength="3" value="<?php echo $name; ?>" required/>
        <input type="password" name="pass" placeholder="password" minlength="6" value="<?php echo $pass; ?>" required/>
        <input type="email" name="email" placeholder="email id" value="<?php echo $email; ?>" required/>
        <button name="submit">Create</button>
        <p class="message">Already Registered? <a href="login.php">Login</a>
        </p>
        </form>

    </div>      
    </div>
 </body>    
</html>