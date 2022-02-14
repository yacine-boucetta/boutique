<?php



class Model{

private $dbName;
private $hostName;
private $dbLogin;
private $dbPassword;

    function __construct(){
        $this->dbName ='boutique';
        $this->hostName ='localhost';
        $this->dblogin='root';
        $this->dbPassword='root';
        $this->db='';
    try{

    $this->db= new PDO('mysql:host='.$this->hostName.';dbname='.$this->dbName.';charset=utf8,'.$this->dbLogin.','.$this->dbPassword.'');
    }

    catch (PDOException $e) {
        echo 'Echec de la connexion : ' . $e->getMessage();
        exit;
    }
}


}