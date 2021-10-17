<?php 
require('php/connect.php');
require('php/requestParser.php');

class RequestsHandler {

    public function __construct(){
        $connect = new ConnectToBD;
        $this->connexion = $connect->connexion;
    }

    function handleRequest(){
        $res = array();
        $request = new RequestParser();
        $stmt = $this->connexion->prepare($request->parseFilters());
        $stmt->execute();
        $movCheck = array("");
        $currMov = array();
        foreach($stmt->fetchAll() as $result){
            if($movCheck[0] != $result[0]){
                if(!empty($currMov)){
                    array_push($res, $currMov);
                }
                $currMov = array();
                $currMov[] = array(
                    $result[0],
                    $result[1],
                    $result[2],
                    $result[3],
                    $result[4],
                    $result[5],
                    array($result[6]),
                    array($result[7] . ' ' . $result[8]));
            }
            else {
                if(!in_array($result[6], $currMov[0][6])){
                    array_push($currMov[0][6], $result[6]);
                }
                if(!in_array($result[7] . ' ' . $result[8], $currMov[0][7])){
                    array_push($currMov[0][7], $result[7] . ' ' . $result[8]);
                }
            }
            $movCheck = $result;
        }
        return $res;
    }


    public function getLanguages(){
        $stmt = $this->connexion->prepare("select distinct language from Movie group by language");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGenres(){
        $stmt = $this->connexion->prepare("select distinct Genre from Genre group by genre");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGenresId(){
        $stmt = $this->connexion->prepare("select distinct Id, Genre from Genre group by genre");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>