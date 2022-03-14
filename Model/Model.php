<?php
session_start();

class Model
{

    protected $db;
    function __construct(){
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8','root','root');
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
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
        $getProd = $this->db->prepare("SELECT * FROM produits");
        $getProd->execute();
        $getProduit = $getProd->fetchall(PDO::FETCH_ASSOC);
        return $getProduit;
    }
    public  function articleCheck($id){
        $getProd = $this->db->prepare("SELECT * FROM produits WHERE id=:id ");
        $getProd->execute(array(':id' => $id));
        $getProduit = $getProd->rowCount();
        return $getProduit;
    }

    public function query($query){
        $research="SELECT * FROM produits
        WHERE (`nom` LIKE '%".$query."%') OR (`description` LIKE '%".$query."%')"  ;
        $search= $this->db->prepare($research);
        $search->execute();
        $searching=$search->fetchAll(PDO::FETCH_ASSOC);
  return $searching;
    
    }
}
