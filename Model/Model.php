<?php
session_start();

class Model
{

    protected $db;
    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8','root','root');
        } catch (PDOException $e) {
            echo 'Echec de la connexion : ' . $e->getMessage();
            exit;
        }
    }

    public function checkUser($login)
    {
        $sqlinsert = "SELECT * FROM user WHERE login=:login ";
        $signIn = $this->db->prepare($sqlinsert);
        $signIn->execute(array(
            ':login' => $login,
        ));
        $checkUser= $signIn->rowCount();
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