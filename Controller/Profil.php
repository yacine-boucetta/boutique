<?php

require('model/User.php');

class Profil
{



    public static function  viewProfil()
    {   Profil::checkEmpty();
        Profil::updateLogin();
        Profil::updateEmail();
        Profil::updatePassword();
        Profil::updateLastName();
        Profil::updateFirstName();
        require("view/profil.php");
    }
    public static function checkEmpty()
    {

        if (empty($_POST['login'])) {
            $_POST['login'] = $_SESSION['user']['login'];
        }
        if (empty($_POST['password'])) {
            $_POST['password'] = $_SESSION['user']['password'];
        }
        if (empty($_POST['password2'])) {
            $_POST['password2'] = $_SESSION['user']['password'];
        }
        if (empty($_POST['email'])) {
            $_POST['email'] = $_SESSION['user']['email'];
        }
        if (empty($_POST['firstName'])) {
            $_POST['firstName'] = $_SESSION['user']['prenom'];
        }
        if (empty($_POST['lastName'])) {
            $_POST['lastName'] = $_SESSION['user']['nom'];
        }
    }
    public static function updateLogin()
    {
        $message = '';
        if (isset($_POST['valider'])) {
            $check = new Model();
            $checkLogin = $check->checkUser(htmlspecialchars($_POST['login'],ENT_QUOTES, "ISO-8859-1"));

            if ($checkLogin > 0) {
                $message = loginError();
                return $message;
            } else {
                $update = new User();
                $update->loginUpdate(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));
            }
        }
    }

    public static function updatePassword()
    {
        $password=htmlspecialchars($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        $password2=htmlspecialchars($_POST['password2'], ENT_QUOTES, "ISO-8859-1");
        if (isset($_POST['valider'])) {
            if(strlen($_POST['password']) < 6){
                $message=passwordError();
            }
            if (strlen($_POST['password']) >= 6) {
                if ($password == $password2) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $updatepassword = new User();
                    $updatepassword->passwordUpdate($password);
                    
            }
        }
    }}
    public static function updateEmail(){
        if (isset($_POST['valider'])){
            $update = new User();
            $update->lastNamedUpdate(htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1"));    
        }
    }

    public static function updateFirstName(){
        if (isset($_POST['valider'])){
            $update = new User();
            $update->firstNamedUpdate(htmlspecialchars($_POST['firstName'], ENT_QUOTES, "ISO-8859-1"));    
        }
    }

    public static function updateLastName(){
        if (isset($_POST['valider'])){
            $update = new User();
            $update->lastNamedUpdate(htmlspecialchars($_POST['lastName'], ENT_QUOTES, "ISO-8859-1"));    
        }
    }


}
