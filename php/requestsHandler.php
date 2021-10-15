<?php 
include('connect.php');
class RequestsHandler {
    public static function getMoviesByTitleAsc(){
        $connect = connectBD();
        $stmt = $connect->prepare("select distinct * from Movies group by title asc");
        $stmt.execute();
        return $stmt.fetchAll();
        $connect->closeCursor();
    }

    public static function getMoviesByTitleDesc(){
        return 0;
    }

    public static function getMoviesByReleaseDateAsc(){
        return 0;
    }

    public static function getMoviesByReleaseDateDesc(){
        return 0;
    }

    public static function getLanguages(){
        $connect = connectBD();
        $stmt = $connect->prepare("select distinct language from Movies group by language asc");
        $stmt.execute();
        return $stmt.fetchAll();
        $connect->closeCursor();
    }

    public static function getGenres(){
        $connect = connectBD();
        $stmt = $connect->prepare("select distinct Genre from Genre group by genre asc");
        $stmt.execute();
        return $stmt.fetchAll();
        $connect->closeCursor();
    }
}

?>