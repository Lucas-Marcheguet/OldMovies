<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/login.css">
    <link rel="stylesheet" href="static/css/header.css">
<body>
<?php 
include('php/header.php');
require('php/connect.php');
require('php/usersHandler.php');

$header = new Header;
$header->print_header();
?>
    <form action="" method="post">
    <label for="username">Nom d'utilisateur : </label>
        <input type="text" name='username' id='username'>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <button type="submit" name='login'>Se connecter</button>
    </form>
</body>
</html>


<?php
    function handleLogin(){
        if(isset($_POST['username']) && isset($_POST['password'])){
            session_start();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $res = UsersHandler::findUserId( $_SESSION['username'],  $_SESSION['password']);
            if(!$res){
                echo "<p class='error'>Nom d'utilisateur ou mot de passe incorrect</p>";
                $_SESSION['username']=null;
                $_SESSION['password']=null;
            }
            else {
                $hashed_pass = UsersHandler::encrypt( $_SESSION['password'], $res[2]);
                if($hashed_pass['hash'] == $res[1]){
                    setcookie('connected', 'true', time()+3600, '/');
                    setcookie('username', $_SESSION['username'], time()+3600, '/');
                    header('Location: ./index.php');
                }
                else {
                    echo "<p class='error'>Nom d'utilisateur ou mot de passe incorrect</p>";
                    $_SESSION['username']=null;
                    $_SESSION['password']=null;
                }
        
            }
        }
    }

    if(isset($_POST['login'])){
        handleLogin();   
    }

    unset($_POST['username']);
    unset($_POST['password']);
?>