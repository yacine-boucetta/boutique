<?php
session_start();

class Model
{

    private $dbName;
    private $hostName;
    private $dbLogin;
    private $dbPassword;

    function __construct()
    {
        $this->dbName = 'boutique';
        $this->hostName = 'localhost';
        $this->dblogin = 'root';
        $this->dbPassword = 'root';

        try {
            $this->db = new PDO('mysql:host=' . $this->hostName . ';dbname=' . $this->dbName . ';charset=utf8,' . $this->dbLogin . ',' . $this->dbPassword . '');
        } catch (PDOException $e) {
            echo 'Echec de la connexion : ' . $e->getMessage();
            exit;
        }
    }

    public  function checkUser($login)
    {
        $sqlinsert = "SELECT * FROM utilisateurs WHERE login=:login ";
        $signIn = $this->db->prepare($sqlinsert);
        $signIn->execute(array(
            ':login' => $login
        ));
        $checkUser = $signIn->fetch(PDO::FETCH_ASSOC);
        return $checkUser;
    }

    public function getProd()
    {
        $getProd = $this->db->prepare("SELECT * FROM product");
        $getProd->execute();
        $getProduit = $getProd->fetchall(PDO::FETCH_ASSOC);
        return $getProduit;
    }
}
