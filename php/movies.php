<?php
require(dirname(__FILE__) . '\movie.php');
require(dirname(__FILE__) . '\errorHandler.php');
class MoviesDisplay {
    private $movies = array();
    function __construct($requestHandler){
        $moviesReq = $requestHandler->handleRequest();
        foreach($moviesReq as $value){
            if(!($value[0][1] == 'none')){
                array_push($this->movies, new Movie(
                    $value[0][0], 
                    $value[0][1],  
                    $value[0][2], 
                    $value[0][4], 
                    $value[0][3], 
                    $value[0][5],
                    $value[0][7],
                    $value[0][6]
                ));
            }
        }
    }   

    function printMovies(){
        $str = '<div class="resultMovies">';
        if($_COOKIE['connected']){
            if(empty($this->movies)){
                errorHandler::notFoundError();
            }
            else {
                foreach($this->movies as $movie){
                    $str .= $movie->printMovie();
                }
            }
        }
        else {
            $str .= ("<p class='error-connection'>Erreur, vous n'êtes pas connecté</p>");
        }
        $str .= '</div>';
        return $str;
    }



}

?>