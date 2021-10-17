<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="static/css/signin.css">
    <link rel="stylesheet" href="static/css/header.css">
<body>
    <?php
        require('php/connect.php');
        require('php/usersHandler.php');
        include_once('php/header.php');


        $header = new Header;
        $header->print_header();
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
                echo "<p class='success'>Félicitaiton ! vous êtes maintenant inscrit sur Old_Movies</p>";
                echo "<p class='info'>Vous allez être redirigé dans 20 secondes vers la page d'acceuil</p>";
                echo "<p class='info'>Vous n'aurez plus qu'a vous connecter pour consulter notre base de donnée</p>";
                header( "refresh:5;url=./index.php" );
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
        <label for="username">Nom d'utilisateur : </label>
        <input type="text" name='username' id='username'>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <button type="submit" name='signin'>S'inscrire</button>
    </form>
</body>
</html>