<!DOCTYPE html>

<?php
    $salt = 'XyZzy12*_';
    $hash = '1a52e17fa899cf40fb04cfc42e6352f1';
    $err_msg = '';
    if  (isset($_POST['dopost'])){
        if (($_POST['who'] === '') || ($_POST['pass'] === '')){
            $err_msg = 'User name and password are required';
        }   elseif  (hash('md5', $salt.$_POST['pass']) != $hash){
            $err_msg = 'Incorrect password';
        }   else    {
            header("Location: game.php?who=".urlencode($_POST['who']));
        }
    }
?>

<html>
    <head><title>Kasimov Viacheslav</title></head>
    <body>
        <h1>Please log in</h1>
        <div style="color: red;"><?= $err_msg ?></div>
        <form method="post">
            <div>
                <span>User name</span>
                <input type="text" name="who" size="40">
            </div>
            <div>
                <span>Password</span>
                <input type="password" name="pass" size="40">
            </div>
            <div>
                <input type="submit" name="dopost" value="Log In">
                <input type="button" name="escape" onclick="location.href='/index.php'; return false;" value="Cancel">
            </div>
        </form>
    </body>
</html>