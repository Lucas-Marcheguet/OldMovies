<?php 

date_default_timezone_set("Europe/Paris");


try {
    $file_db = new PDO('sqlite:contactssqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $file_db->exec("CREATE TABLE IF NOT EXISTS")

}
catch(PDOException $e) {

}