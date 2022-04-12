<?php
require('model/User.php');
class SignIn
{


    function __construct()
    {
    }

    public static function signInView()
    {

        $message = SignIn::signInAction();
        require_once('view/signIn.php');
    }

    public static function signInAction()
    {
        $message = '';
        $signIn = new Model();
        if (isset($_POST['signIn'])) {
            if ($signIn->checkUser($_POST['login']) < 1) {
                $message = signError();
                return $message;
            } else {           
                $newUser = new User();
                $user = $newUser->userConnexion($_POST['login']);
                if (password_verify(htmlspecialchars($_POST['password'], ENT_QUOTES, "ISO-8859-1"), $user['password'])) {
                    $_SESSION['user'] = $user; 
                    header('Location:./');
                }
            }
        }
    }
}
