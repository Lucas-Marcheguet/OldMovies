<?php
require('connect.php');
class Header {

    function getUsername(){
        return $_COOKIE['username'];
    }

    function print_header(){
        if($_COOKIE['connected'] == 'false'){
            echo ("
            <div class='header'>
                <p class='TitleLogo'>Old_Movies</p>
    
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
                <p class='TitleLogo'>Old_Movies</p>
    
                <div class='log'>
                    <p class='username'>".getUsername()."</p>
                    <a href='logout.php'>Se deconnecter</a>
                </div>
            </div>
            ");
        }
    }
}


?>