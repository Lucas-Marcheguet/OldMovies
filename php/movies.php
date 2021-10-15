<?php

require('connexion.php');

class MovieDisplay {
    function __construct($movies){
        $this->connexion = connectBD();
        $this->movies = $movies;
    }   

    function printMovies(){
        $str = '<div class="resultMovies">';
        if($_COOKIE['connected']){
            foreach($this->movies as $movie){
                $str .= $movie->printMovie();
            }
        }
        else {
            $str .= ("<p class='error-connection'>Erreur, vous n'êtes pas connecté</p>")
        }
        $str .= '</div>'
        $this->connexion->closeCursor();
        return $str;
    }



}
/*function print_movies($data){
    $string;
    foreach($data as $movie){
        $string .= prepare_movie($movie["Titre"], $movie["Realisateur"],$movie["Genre"]);
    }
    return $string;
}*/

?>