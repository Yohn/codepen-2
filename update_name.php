<?php

if (!$_SERVER['REQUEST_METHOD'] === 'POST')
    header('Location: index.php');

include 'checkUser.php';

if ($isLogged === false)
    header('Location: index.php');
else {
    if (!empty($_POST['pid']) || !empty($_POST['pname'])) {

        include 'connect.php';

        $pid = $_POST['pid'];
        $pname = $_POST['pname'];


        $result = mysqli_query($conn, "SELECT * FROM projects WHERE pid='$pid'");
        if (!$result->num_rows > 0)
            echo 'Fatal Error';
        else {
            $row = mysqli_fetch_assoc($result);

            if($row['user'] === $_SESSION['uid']) {
                $sql = "UPDATE projects SET pname='$pname' WHERE pid='$pid'";

                if (mysqli_query($conn, $sql))
                    echo "<p class='success'>Project Name Updated!</p>";
                else
                    echo "<p class='error'>Try again...</p>";
            } else 
                header('Location: index.php');
        }
    }
}
