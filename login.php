<!DOCTYPE html>
<html lang="fr">
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
        <input type="text" name='username'>
        <input type="password" name='password'>
        <button type="submit" name='login'>Se connecter</button>
    </form>
</body>
</html>


<?php
    function getUser(){
        $id = UsersHandler::findUserId($_POST['username'], $_POST['password']);
        if(!$id){
            echo "<p class='error'>Rien n'a été trouvé</p>";
        }
        else {
            $result = $stmt->fetch();
            $random_string = uniqid(Rand(0, 1000000));
            $session_key = hash('sha512', $random_string);
            $stmt->prepare("INSERT into userToken values (?, ?, ?)", $result[0], $session_key, date('YYYY-MM-DD'));
        }
    }

    if(isset($_POST['login'])){
        getUser();   
    }
?>