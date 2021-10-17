<?php
class Header {

    function getUsername(){
        if(isset($_COOKIE['username'])){
            return $_COOKIE['username'];
        }
    }

    function print_header(){
        if(!isset($_COOKIE['connected'])){
            echo ("
            <div class='header'>
                <a href='./index.php' class='TitleLogo'>Old Movies</p>
    
                <div class='log'>
                    <a href='login.php'>Se connecter</a>
                    <a href='signin.php'>S'inscrire</a>
                </div>
            </div>
            ");
        }
        else {
            echo ("
            <div class='header'>
                <p class='TitleLogo'>Old Movies</p>
    
                <div class='log'>
                    <p class='username'>".$this->getUsername()."</p>
                    <a href='logout.php'>Se déconnecter</a>
                </div>
            </div>
            ");
        }
    }
}


?>