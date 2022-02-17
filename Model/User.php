<?php

class User extends Model
{

    public $login;
    public $password;
    public $firstname;
    public $lastname;
    public $email;

    function __construct($login,$password,$firstname,$lastname,$email)
    {
        $this->login=$login;
        $this->password=$password;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->email=$email;
        parent::__construct($this->db);
        
    }

    //---------- inserer pour inscription---------

    public function setUser()
    {
        $sqlinsert = "INSERT INTO user (login,password,nom,prenom,email,id_droits) VALUES(:login,:password,:nom,:email,:prenom,:id_droits)";
        $signUp = $this->db->prepare($sqlinsert);
        $signUp->execute(array(
            ":login" => $this->login,
            ":password" => $this->password,
            ":nom"=>$this->lastname,
            ":prenom"=>$this->firstname,
            ":email"=>$this->email,
            ":id_droits"=>1
        ));
    }
}