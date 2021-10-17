<?php 
require('php/connect.php');
require('php/requestParser.php');

class RequestsHandler {

    function handleRequest(){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        $res = array();
        $request = new RequestParser();
        $stmt = $connexion->prepare($request->parseFilters());
        $stmt->execute();
        $movCheck = array("");
        $currMov = array();
        $reqRes = $stmt->fetchAll();
        foreach($reqRes as $result){
            if($movCheck[0] != $result[0] || $movCheck[0] == $reqRes[sizeof($reqRes)-1][0]){
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
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        $stmt = $connexion->prepare("select distinct language from Movie group by language");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGenres(){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        $stmt = $connexion->prepare("select distinct Genre from Genre group by genre");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGenresId(){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        $stmt = $connexion->prepare("select distinct Id, Genre from Genre group by genre");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>