<?php 
    include 'checkUser.php'
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wclassth=device-wclassth, initial-scale=1.0">
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
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
        <div class="post">
            <div class="post-img">
                <img src="image/CSS.png" alt="pic" height="100px">
            </div>
            <div class="post-detail">
                our
            </div>
        </div>
</body>

</html>