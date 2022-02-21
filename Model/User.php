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


//------------Profil--------------------------------------------------------

public function loginUpdate($login){
    $update=$this->db->prepare("UPDATE `user` SET login=:login WHERE id= :id");
    $update->execute(array(
        ':login'=>$login,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function passwordUpdate($password){
    $update=$this->db->prepare("UPDATE `user` SET `password`=:password WHERE `id`= :id");
    $update->execute(array(
        ':password'=>$password,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function emailUpdate($email){
    $update=$this->db->prepare("UPDATE `user` SET `email`=:email WHERE `id`= :id");
    $update->execute(array(
        ':email'=>$email,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function firstNamedUpdate($firstName){
    $update=$this->db->prepare("UPDATE `user` SET `firstName`=:firstname WHERE `id`= :id");
    $update->execute(array(
        ':firstname'=>$firstName,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function lastNamedUpdate($lastName){
    $update=$this->db->prepare("UPDATE `user` SET `lasttName`=:lastname WHERE `id`= :id");
    $update->execute(array(
        ':firstname'=>$lastName,
        ':id'=>$_SESSION['user']['id']
    ));
}
}