<?php 
    include 'checkUser.php';
    include 'connect.php';

    if($isLogged == false) {
        header('Location: login.php');
    } else {
        $project_id = uniqid($uid);

        $sql = "INSERT INTO projects(pid, pname, user) VALUES ('$project_id', 'New Project',$uid)";
        $result = mysqli_query($conn, $sql);

        if ($result){
           header('Location: editor.php?id='.$project_id);

      } else {
          echo("Error description: " . mysqli_error($conn));
      }
    }
?>