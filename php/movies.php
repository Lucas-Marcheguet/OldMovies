<?php
require(dirname(__FILE__) . '\movie.php');
require(dirname(__FILE__) . '\errorHandler.php');
class MoviesDisplay {
    private $movies = array();
    function __construct($requestHandler){
        $moviesReq = $requestHandler->handleRequest();
        foreach($moviesReq as $value){
            if(($value[0][1] == 'none')){
                $value[0][1] = 'static/img/poster_placeholder.jpg';
            }
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

    function printMovies(){
        $str = '<div class="resultMovies">';
        if(isset($_COOKIE['connected'])){
            if(empty($this->movies)){
                $str .= errorHandler::notFoundError();
            }
            else {
                $i = 0;
                foreach($this->movies as $movie){
                    $str .= $movie->printMovie();
                    $i+=1;
                }
            }
        }
        else {
            $str .= "<p class='error'>Erreur, vous n'êtes pas connecté</p>";
        }
        $str .= '</div>';
        echo $str;
    }

    function handleDelete(){
        if(!empty($_POST)){
            foreach($_POST as $key => $value){
                if(strpos($key, "del") !== false){
                    $code = substr($key, 3);
                    $value = explode("////", $code);
                    if($value[1] == 'static/img/poster' || $value[1] == 'static/img/poster_placeholder_jpg'){
                        $value[1] = 'none';
                    }
                    $value[1] = str_replace("_", ".", $value[1]);
                    $value[0] = str_replace("_", " ", $value[0]);
                    $connect = new ConnectToBD;
                    $connexion = $connect->connexion;
                    $stmt = $connexion->prepare('delete from Movie where title="'.$value[0].'" and thumbUrl="'.$value[1].'";');
                    $stmt->execute();
                    $stmt->closeCursor();
                    unset($_POST[$key]);
                    header('refresh:1; url=./index.php');
                }
            }
        }
    }


}

?>