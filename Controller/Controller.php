<?php

class Controller{



    function __construct(){
    }

public static function index($url){
    if ($url[0] == '') {
    Home::getHomePage();
    }   
    
    elseif ($url[0] == 'SignUp') {  
        SignUp::signUpView();
    } 
    elseif ($url[0] == 'SignIn') {
        SignIn::signInView();
    }
    elseif ($url[0] == 'Profil') {
        Profil::viewProfil();
    }  elseif ($url[0] == 'Admin') {   
        Product::insertProduct();
        Admin::addCat();
        Admin::addSubCat();
        Admin::deleteCateg();
        Admin::deleteSubCateg();
        Product::deleteProducts();
        Admin::adminView();
    
    // } elseif ($url[0] == 'product') {
    //     require 'view/product.php';
    // } elseif ($url[0] == 'admin') {
    //     require 'view/admin.php';
    // } else {
    //     require 'view/404.php';
    // }
    }
    elseif ($url[0]== 'order') {
        
        $order=new Order;
        $intent=$order->OrderPay();
        Order::orderView();
        return $intent;
        
    }
    }
}
