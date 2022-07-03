<?php
include 'checkUser.php';

if ($isLogged == false) {
    header('Location: login.php');
}

$pid = $_GET['id'];

if (empty($pid) & $pid == null) {
    header('Location: index.php');
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
} else {
    echo "<script>alert('No Such Project Exists!')</script><center><a href='index.php'>Go To Home</a>";
}

?>

<html>
<head>
    <title><?php echo $pname ?></title>
</head>

<body>
    <script>
        const htmlres = unescape("<?php echo $html ?>");
        const cssres = unescape("<?php echo $css ?>");
        const jsres = unescape("<?php echo $js ?>");

        document.body.innerHTML += htmlres;
        document.head.innerHTML += `<style>${cssres}</style>`
        window.eval(jsres)
    </script>
 
</body>

</html>