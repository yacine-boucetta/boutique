<?php


class Home extends Controller{
function __construct(){

}

public static function getHomePage(){
require('view/home.php');
}


}