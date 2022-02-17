<?php

class User extends Model
{

    public $login;
    public $password;
    public $firstname;
    public $lastname;
    public $email;

    function __construct()
    {
        $this->login;
        $this->password ;
        $this->firstname ;
        $this->lastname ;
        $this->email ;
        parent::__construct($this->db);
    }

    //---------- inserer pour inscription---------

    public function setUser($login,$password,$firstname,$lastname,$email)
    {
        $sqlinsert = "INSERT INTO user (login,password,nom,prenom,email,id_droits) VALUES(:login,:password,:nom,:email,:prenom,:id_droits)";
        $signUp = $this->db->prepare($sqlinsert);
        $signUp->execute(array(
            ":login" => $login,
            ":password" => $password,
            ":nom" => $lastname,
            ":prenom" => $firstname,
            ":email" => $email,
            ":id_droits" => 1
        ));
    }


    //---------connexion--------------------------------

    public function userConnexion($login){
        $sqlinsert = "SELECT * FROM user WHERE login=:login ";
        $signIn = $this->db->prepare($sqlinsert);
        $signIn->execute(array(
            ':login' => $login,
        ));
        $user=$signIn->fetch(PDO::FETCH_ASSOC);
        return ($user);
}
}