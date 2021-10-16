<?php

class UsersHandler{

    static function encrypt($plain_text) {
        $salt = uniqid(Rand(0, 1000000));
        return array(
            'hash' => $salt.hash('sha256', $salt.$plain_text),
            'salt' => $salt
        );
    }

    static function createToken(){
        $random_string = uniqid(Rand(0, 1000000));
        return hash('sha512', $random_string);
    }

    static function findUserId($user, $password){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        
        $encrypted_pass = UsersHandler::encrypt($password);
        $stmt = $connexion->prepare("SELECT id, username, password, salt from USER natiral join usertoken where username='". $_POST['username'] ."' and password='". $encrypted_pass['hash'] ."';");
        $stmt->execute();
        if($stmt->rowCount()==0){
            return null;
        }
        return $stmt->fetchAll()[0];
    }

    static function userExists($username){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        
        
        $stmt = $connexion->prepare("select username from USER where username='".$username."';");
        $stmt->execute();
        print_r(empty($stmt->fetch()));
        if(empty($stmt->fetch())){
            return false;
        }
        return true;
    }

    static function addUserToDb($username, $password){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        $stmt = $connexion->prepare('select max(id) from User;');
        $stmt->execute();
        $ids = $stmt->fetch();
        $id = $ids[0]+1;
        $pass = UsersHandler::encrypt($password);
        $stmt = $connexion->prepare("insert into User values ('". $id. "','" . $username ."', '". $pass['hash'] . "', '" . $pass['salt'] ."');");
        $stmt->execute();
    }
}


?>