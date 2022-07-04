<?php 
    include 'checkUser.php';

    include 'connect.php';

    $sql = 'SELECT projects.pid, projects.pname, users.name FROM projects INNER JOIN users ON projects.user=users.uid;';

    $results = mysqli_query($conn, $sql);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="header_one">
            <h1 class="h1">editor </h1>
        </div>
        <div class="header_two"><input type="search" /> </div>
        <div class="header_three">
            <?php 
                if($isLogged === true) {
                    echo '<a href="create_new.php" class="button">Create New</a>';
                    echo '<a class="avatar" href="logout.php" title="Click to LOGOUT">
                            <div class="avatar__letters">'. ucfirst($username)[0] .'</div>
                        </a>';
                } else {
                    echo '<a href="login.php" class="button">Login</a>';
                    echo '<a href="register.php" class="button">Register</a>';
                }
            ?>
        </div>
        </div>
    </header>
    <br>
    <br>
    <div class="feed">
        
    <?php 
        if($results->num_rows < 0)
            echo '<center><h1>Nothing to display!</h1></center>';
        else 
            while($row = mysqli_fetch_assoc($results)) {
                echo 
                    "<a class='post' href='editor.php?id=". $row['pid'] ."'>
                        <div class='post-img'>
                            <iframe src='view.php?id=". $row['pid'] ."' sandbox='allow-forms allow-pointer-lock allow-same-origin allow-scripts allow-presentation' frameborder='0' loading='lazy' scrolling='no'></iframe>
                        </div>
                        <div class='post-detail'>
                            <div class='avatar square'>
                                <div class='avatar__letters'>". ucfirst($row['name'])[0] ."</div>
                            </div>
                            <div class='user-info'>
                                <div class='post-title'>". $row['pname'] ."</div>
                                <span>". $row['name'] ."</span>
                            </div>
                        </div>
                    </a>";
                
            }
        ?> 
    </div>
</body>

</html>