<?php

class Controller{



    function __construct(){
    }

public static function index($url){
    
    if ($url[0] == '') {
    Home::getHomePage();
    }   
    
    elseif ($url[0] == 'SignUp') {
        SignUp::signUpAction();  
        SignUp::signUpView();
    } 
    elseif ($url[0] == 'SignIn') {
        SignIn::signInAction();
    }
    elseif ($url[0] == 'Admin') {
            
            Product::insertProduct();
            Admin::addCat();
            Admin::addSubCat();
            //Admin::displayCat();
            Admin::deleteCateg();
            Admin::deleteSubCateg();
            //Admin::displaySubCat();
            // $prod = new Product();
            Product::deleteProducts();
            Admin::adminView();
            // $prod->updateProduct();
            // $admin = new Admin();
            // $admin->addCat(htmlspecialchars($_POST['catName']));
            // $admin->addSubCat();
            // $admin->displayCat();

    // } elseif ($url[0] == 'product') {
    //     require 'view/product.php';
    // } elseif ($url[0] == 'admin') {
    //     require 'view/admin.php';
    // } else {
    //     require 'view/404.php';
    // }
}
}
}