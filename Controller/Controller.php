<?php

class Controller
{



    function __construct()
    {
    }

    public static function index($url)
    {
        if ($url[0] == '') {
            Home::getHomePage();
        } elseif ($url[0] == 'SignUp') {
            SignUp::signUpView();
        } elseif ($url[0] == 'SignIn') {
            SignIn::signInView();
        } elseif ($url[0] == 'Profil') {
            Controller::checkoutSession();
            Profil::viewProfil();
        } elseif ($url[0] == 'Admin') {
            Controller::adminSession();
            Product::insertProduct();
            Admin::addCat();
            Admin::addSubCat();
            Admin::deleteCateg();
            Admin::deleteSubCateg();
            Product::deleteProducts();
            Admin::adminView();
        } elseif ($url[0] == 'order') {
            $order = new Order;
            $intent = $order->OrderPay();
            Order::orderView();
            return $intent;
        } elseif ($url[0] == 'Product') {
            Product::showProduct();
            Product::productView();
        } elseif ($url[0] == 'Deconnexion'){
            Controller::disconnect();
        }
        elseif ($url[0] == 'Article') {
            var_dump($url);

            if (isset($url[1])) {
                Article::GetArticle($url[1]);
            }
            Article::viewArticle();
        }
    }


public static function checkoutSession(){
if(!isset($_SESSION['user'])){
    header('Location:./Home');
}}

public static function adminSession(){
if($_SESSION['user']['id_droits']=1){
    header ('Location:./');
}}
public static function disconnect(){
    session_unset();
    session_destroy();
    header('Location:./');
}
}

