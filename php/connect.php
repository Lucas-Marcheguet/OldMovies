<?php 

class ConnectToBD {

    public $connexion;

    public function __construct(){
        try {
            $this->connexion = new PDO('sqlite:./sqlite/movies.sqlite');
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
            exit();
        }
    }
}

?>