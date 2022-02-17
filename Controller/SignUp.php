<?php
require('model/User.php');

class SignUp
{

    function __construct()
    {
    }

    public static function signUpView()
    {
        $message = '';
        require('view/signUp.php');
    }

    public static function signUpAction()
    {
        if (isset($_POST['sign_up'])) {

            $a = new Model();
            $b = $a->checkUser($_POST['login']);

            if ($b > 0) {
                $message = loginError();
                return false;
            }

//             $uppercase = preg_match('@[A-Z]@', $password);
// $lowercase = preg_match('@[a-z]@', $password);
// $number    = preg_match('@[0-9]@', $password);

// if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
  // tell the user something went wrong
// }
            if (strlen($_POST['password']) < 6) {
                $message = lengthError();
                return false;
            } else {
                $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT));
                $newLogin = htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1");
                $newEmail = htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1");
                $newFirstName = htmlspecialchars($_POST['firstname'], ENT_QUOTES, "ISO-8859-1");
                $newLastName = htmlspecialchars($_POST['lastname'], ENT_QUOTES, "ISO-8859-1");
                $newUser = new User($newLogin, $password, $newEmail, $newFirstName, $newLastName);
                $newUser->setUser();
            }
        }
        return $message;
    }
}
