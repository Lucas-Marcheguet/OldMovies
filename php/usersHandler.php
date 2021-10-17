<?php

class UsersHandler{

    static function encrypt($plain_text, $salt) {
        if(!$salt){
            $salt = uniqid(Rand(0, 1000000));
        }
        return array(
            'hash' => $salt.hash('sha256', $salt.$plain_text),
            'salt' => $salt
        );
    }

    static function createToken(){
        $random_string = uniqid(Rand(0, 1000000));
        return hash('sha512', $random_string);
    }

    static function findUserId($username){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
    
        $stmt = $connexion->prepare("SELECT id, username, password, salt from USER where username='". $username ."';");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $user){
            if($user['username'] == $username){
                return array($user['id'], $user['password'], $user['salt']);
            }
        }
        return false;
    }

    static function userExists($username){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        
        
        $stmt = $connexion->prepare("select username from USER where username='".$username."';");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $user){
            if($user['username'] == $username){
                return true;
            }
        }
        return false;
    }

    static function addUserToDb($username, $password){
        $connect = new ConnectToBD;
        $connexion = $connect->connexion;
        $stmt = $connexion->prepare('select max(id) from User;');
        $stmt->execute();
        $ids = $stmt->fetch();
        $id = $ids[0]+1;
        $pass = UsersHandler::encrypt($password, false);
        $stmt = $connexion->prepare("insert into User values ('". $id. "','" . $username ."', '". $pass['hash'] . "', '" . $pass['salt'] ."');");
        $stmt->execute();
    }
}


?>