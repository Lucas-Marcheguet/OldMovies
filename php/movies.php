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
            $str .= "<p class='error-connection'>Erreur, vous n'êtes pas connecté</p>";
        }
        $str .= '</div>';
        echo $str;
    }

    function handleDelete(){
        if(!empty($_POST)){
            print_r($_POST);
            foreach($_POST as $key => $value){
                if(strpos($key, "del") !== false){
                    $code = explode("_", $key);
                    $values = explode("-", $code[1]);
                    
                    print_r($values);
                    if($values[1] == 'static/img/poster'){
                        $values[1] = 'none';
                    }
                    $connect = new ConnectToBD;
                    $connexion = $connect->connexion;
                    $stmt = $connexion->prepare('delete from Movie where title="'.$values[0].'" and thumbUrl="'.$values[1].'";');
                    $stmt->execute();
                    $stmt->closeCursor();
                    echo 'fait';
                    unset($_POST[$key]);
                    header('Location: index.php');
                }
            }
        }
    }


}

?>