<?php
// Connection à la BDD
function getPDO() {
  include 'config.php';
    $dsn = 'mysql:host=localhost:3306;dbname=caquelin_;charset=utf8';


    try {
        $dbh = new PDO($dsn,$user,$pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    } catch (Exception $e){
        echo $e->getMessage();
    }

    return $dbh;
}
