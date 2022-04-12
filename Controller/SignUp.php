<?php
require('model/User.php');

class SignUp
{

    function __construct()
    {
    }

    public static function signUpView()
    {
        $message=SignUp::signUpAction();
        require('view/signUp.php');
    }

    public static function signUpAction()
    {$message='';
    
        if (isset($_POST['sign_up'])) {   
            if(empty($_POST['password'])||empty($_POST['login'])||empty($_POST['email'])||empty($_POST['firstname'])){
                $message='veuillez remplir tout les champs';
            return $message;
        }
            $a = new Model();
            $b = $a->checkUser($_POST['login']);
            if ($b > 0) {
                $message = loginError();
                return $message;
            }
            $password=$_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
                $message = lengthError();
                return $message;
        }else {
                $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT));
                $newLogin = htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1");
                $newEmail = htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1");
                $newFirstName = htmlspecialchars($_POST['firstname'], ENT_QUOTES, "ISO-8859-1");
                $newLastName = htmlspecialchars($_POST['lastname'], ENT_QUOTES, "ISO-8859-1");
                $newUser = new User();
                $newUser->setUser($newLogin, $password, $newEmail, $newFirstName, $newLastName);
            }
        }
        return $message; 
    }
}
