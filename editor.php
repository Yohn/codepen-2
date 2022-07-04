<?php
include 'checkUser.php';

if ($isLogged == false) {
    header('Location: login.php');
}

$pid = $_GET['id'];

if (empty($pid) & $pid == null) {
    header('Location: create_new.php');
}

include 'connect.php';

$sql = "SELECT * FROM projects WHERE pid='$pid'";

$result = mysqli_query($conn, $sql);


if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    $html = $row['html'];
    $css = $row['css'];
    $js = $row['js'];
    $pname = $row['pname'];
    $user = $row['user'];

    $isOwner = $user === $_SESSION['uid'];
} else {
    echo "<script>alert('No Such Project Exists!')</script>";
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editor</title>
    <link rel="stylesheet" href="css/editor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
</head>

<body>
    <div class="code-editor">
        <form name="code-form" id="code-form">
            <input id="pid" name="pid" value="<?php echo $pid ?>" hidden />
            <div class="code">
                <div class="html-code">
                    <h1><img src="image/-HTML5.png" alt=""> HTML</h1>
                    <textarea name="html"></textarea>
                </div>
                <div class="css-code">
                    <h1>
                        <img src="image/CSS3_.png" alt=""> CSS
                    </h1>
                    <textarea name="css"></textarea>
                </div>
                <div class="js-code">
                    <h1>
                        <img src="image/JS.png" alt=""> JAVASCRIPT
                    </h1>
                    <textarea name="js"></textarea>
                </div>
                <div class="actions">
                    <input type="text" name="pname" id="pname" value="<?php echo $pname ?>" <?php if(!$isOwner) echo "disabled" ?>/>
                    <div class="buttons">
                        <?php
                            if($isOwner)
                                echo '<button type="submit" name="submit" class="button" id="save-btn"> Save </button>';
                            else
                                echo '<span style="display: block;margin-bottom: 16px;text-align: center;cursor: pointer;" class="button">You\'re not the owner of this project</span>'
                        ?>
                        <a href="logout.php" class="button"> Logout </a>
                    </div>
                </div>
            </div>
        </form>
        <iframe src="view.php?id=<?php echo $pid ?>" frameborder="0" id="result">
        </iframe>
    </div>

    <div id="snackbar"></div>

    <script src="js/script.js">
    </script>
    <script>
        const htmlres = unescape("<?php echo $html ?>");
        const cssres = unescape("<?php echo $css ?>");
        const jsres = unescape("<?php echo $js ?>");
        html_code.value = htmlres;
        css_code.value = cssres;
        js_code.value = jsres;

        run();
    </script>
</body>

</html>