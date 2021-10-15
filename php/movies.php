<?php
require('movie.php');
class MoviesDisplay {
    private $movies = array();
    function __construct(){
        $this->request = new RequestsHandler;
        $moviesReq = $this->request->getMoviesByTitleAsc(2);
        foreach($moviesReq as $value){
            if($value[1] == 'none'){
                $value[1] = "./static/img/poster_placeholder.jpg";
            }
            array_push($this->movies, new Movie(
            $value[0], 
            $value[1],  
            $value[2], 
            $value[3], 
            $value[4], 
            $value[5],
            $value['genres'],
            $value['directors']));
        }
    }   

    function printMovies(){
        $str = '<div class="resultMovies">';
        if($_COOKIE['connected']){
            foreach($this->movies as $movie){
                $str .= $movie->printMovie();
            }
        }
        else {
            $str .= ("<p class='error-connection'>Erreur, vous n'êtes pas connecté</p>");
        }
        $str .= '</div>';
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