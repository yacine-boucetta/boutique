<?php

class User extends Model
{

    public $login;
    public $password;
    public $firstname;
    public $lastname;
    public $id_droits;

    function __construct()
    {
        parent::__construct($this->db);
        
    }

    //---------- inserer pour inscription---------
    public function loginCount()
    {

        $sqlinsert = "SELECT *FROM utilisateurs WHERE login=:login";
        $signUp = $this->db->prepare($sqlinsert);
        $signUp->execute(array(
            ":login" => $_POST['login'],
        ));
        $count = $signUp->rowCount();
        return $count;
    }

    public function setUser($login,$password)
    {

        $sqlinsert = "INSERT INTO utilisateurs(login,password) VALUES(:login,:password)";
        $signUp = $this->db->prepare($sqlinsert);
        $signUp->execute(array(
            ":login" => $login,
            ":password" => $password
        ));
        $ok = $signUp->fetch(PDO::FETCH_ASSOC);
        return $ok;
    }
}