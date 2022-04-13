<?php

require('model/User.php');

class Profil
{

    public static function  viewProfil()
    {
        $message = Profil::stackUpdapte();
        require("view/profil.php");
    }

    public static function stackUpdapte()
    {
        $message=[];
        if (isset($_POST['valider'])) {
            Profil::checkEmpty();
            Profil::updateLogin();
            Profil::updateEmail();
            Profil::updatePassword();
            Profil::updateLastName();
            Profil::updateFirstName();
            $display = new User();
            $display->userDisplay($_SESSION['user']['id']);    
            }  

            if(!empty($message)){
            foreach($message as $value){
                echo $value;
                var_dump($value);
        }
        }
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
            $_POST['password2'] = '';
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
        $check = new Model();
        $checkLogin = $check->checkUser(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));
        if ($checkLogin > 0) {
            $message=loginError();
            return $message;
        } 
        else {
            $update = new User();
            $update->loginUpdate(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));
        }
    }

    public static function updatePassword()
    {
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        $password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES, "ISO-8859-1");
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

            if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
            $message = lengthError();
            return $message;
        }
            if (strlen($_POST['password']) >= 6) {
                if ($password == $password2) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $updatepassword = new User();
                    $updatepassword->passwordUpdate($password);
                }
            }
    }
    public static function updateEmail()
    {
        $update = new User();
        $update->emailUpdate(htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1"));
    }

    public static function updateFirstName()
    {
        $update = new User();
        $update->firstNamedUpdate(htmlspecialchars($_POST['firstName'], ENT_QUOTES, "ISO-8859-1"));
    }

    public static function updateLastName()
    {
        $update = new User();
        $update->lastNamedUpdate(htmlspecialchars($_POST['lastName'], ENT_QUOTES, "ISO-8859-1"));
    }

}