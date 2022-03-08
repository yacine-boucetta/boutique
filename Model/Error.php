<?php

function loginError(){
    $error='Ce login existe déjà';
    return $error;
}

//---------error password----------
function lengthError(){
    $error='Votre mot de passe doit contenir au moins 6 caractères une majuscule un chiffre et un caractère spécial';
    return $error;
}

function signError(){
    $error='Le login ou le passe sont incorrect';
    return $error;
}

function passwordError(){
    $error='Les mots de passe ne sont pas identique';
    return $error;
}
?>