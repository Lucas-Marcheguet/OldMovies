<!DOCTYPE html>
<html lang="fr">
<body>
    <?php
        require('php/connect.php');
        require('php/usersHandler.php');
        require('php/header.php');
    ?>

    <?php

    function handleSignin(){
        if(isset($_POST['username']) && isset($_POST['password'])){
            session_start();
            $_SESSION['username']=$_POST['username'];
            $_SESSION['password']=$_POST['password'];
            if(UsersHandler::userExists($_SESSION['username'])){
                $_SESSION['username']=null;
                $_SESSION['password']=null;
                echo '<p class="error">Cet utilisateur existe déjà</p>';
            }
            else {
                UsersHandler::addUserToDb($_SESSION['username'], $_SESSION['password']);
            }
        }
    }

    if(isset($_POST['signin'])){
        handleSignin();
    }


    unset($_POST['username']);
    unset($_POST['password']);
    ?>

    <form action="" method='post'>
        <input type="text", name='username'>
        <input type="password" name="password" id="password">
        <button type="submit" name='signin'>S'inscrire</button>
    </form>
</body>
</html>