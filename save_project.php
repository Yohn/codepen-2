<?php

if (!$_SERVER['REQUEST_METHOD'] === 'POST')
    header('Location: index.php');

include 'checkUser.php';

if ($isLogged === false)
    header('Location: index.php');
else {
    if (!empty($_POST['pid']) || !empty($_POST['html']) || !empty($_POST['css']) || !empty($_POST['js'])) {

        include 'connect.php';

        $pid = $_POST['pid'];

        $html = $_POST['html'];
        $css = $_POST['css'];
        $js = $_POST['js'];


        $result = mysqli_query($conn, "SELECT * FROM projects WHERE pid='$pid'");
        if (!$result->num_rows > 0)
            echo 'Fatal Error';
        else {
            $row = mysqli_fetch_assoc($result);

            if($row['user'] === $_SESSION['uid']) {
                $htmlcode = addslashes(mysqli_real_escape_string($conn, $html));
                $csscode = addslashes(mysqli_real_escape_string($conn, $css));
                $jscode = addslashes(mysqli_real_escape_string($conn, $js));

                $sql = "UPDATE projects SET html='$htmlcode', css='$csscode', js='$jscode' WHERE pid='$pid'";

                if (mysqli_query($conn, $sql))
                    echo "<p class='success'>Saved</p>";
                else
                    echo "<p class='error'>Try again...</p>";
            } else 
                header('Location: index.php');


        }
    }
}
