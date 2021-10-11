<?php 
function connect_bd(){
    $db = 'sqlite:/tmp/movies.sqlite';
    try {
        $connexion = new PDO($db);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
        exit();
    }

    return $connexion;
}