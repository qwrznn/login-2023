<?php
include_once 'db.php';
$error = "";
$count = count($accounts);
if (isset($_POST['Send'])) {
    if (!preg_match('/^\w+$/', $_POST['login'])) {
        $error = "login error";
    } else {
        for ($i = 0; $i < $count; $i++) {
            if ($_POST['login'] === $accounts[$i]['login'] && $_POST['pass'] === $accounts[$i]['pass']) {
                header("Location: admin.php?login={$_POST['login']}");
            }
        }
        for ($i = 2; $i < $count; $i++) {
            if ($_POST['login'] === $accounts[$i]['login'] && $_POST['pass'] === $accounts[$i]['pass']) {
                header("Location: user.php?login={$_POST['login']}");
            }
        }
        for ($i = 3; $i < $count; $i++) {
            if ($_POST['login'] != $accounts[$i]['login'] && $_POST['pass'] != $accounts[$i]['pass']) {
               echo "Your login or password are incorrect or you are not logged in this website. Please try again";
            }
        }
    }
}
if (isset($_POST['Clear'])) {
    unset($_POST);
    $error = "";
    header("Location: {$_SERVER['PHP_SELF']}");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
        <input type="text" name="login" id="login">
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" name="Send" value="Send">
        <input type="submit" name="Clear" value="Clear">
    </form>
</body>

</html>