<?php 
require('php/connect.php');

class RequestsHandler {

    public $connexion;

    public function __construct(){
        $connect = new ConnectToBD;
        $this->connexion = $connect->connexion;
    }

    public function getMoviesByTitleAsc($page){
        $stmt = $this->connexion->prepare("
        select distinct title, thumburl, releasedate, ratingscore, language, plot, genre, firstname, lastname
        from Movie natural join PossessGenre natural join PossessDirector natural join Director natural join Genre
        order by title asc");
        $stmt->execute();
        $res = array();
        $movCheck;
        $currMov = array();
        foreach($stmt->fetchAll() as $result){
            if($movCheck[0] != $result[0]){

                if(!empty($currMov)){
                    array_push($res, $currMov);
                }
                $currMov = array();
                array_push($currMov, 
                array(
                    $result[0],
                    $result[1],
                    $result[2],
                    $result[3],
                    $result[4],
                    $result[5],
                    "genres" => array($result[6]),
                    "directors" => array($result[7] . ' ' . $result[8])));
            }
            else {
                    array_push($currMov['genres'], $result[6]);
                    array_push($currMov['directors'], $result[7] . ' ' . $result[8]);
            }
            $movCheck = $result;
        }

        return $res;
    }

    public function getMoviesByTitleDesc(){
        return 0;
    }

    public function getMoviesByReleaseDateAsc(){
        return 0;
    }

    public function getMoviesByReleaseDateDesc(){
        return 0;
    }

    public function getLanguages(){
        $stmt = $this->connexion->prepare("select distinct language from Movie group by language");
        $stmt->execute();
        return $stmt->fetchAll();
        $this->connexion->closeCursor();
    }

    public function getGenres(){
        $stmt = $this->connexion->prepare("select distinct Genre from Genre group by genre");
        $stmt->execute();
        return $stmt->fetchAll();
        $this->connexion->closeCursor();
    }
}
?>