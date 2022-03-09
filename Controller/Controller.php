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
        $order->test();
        return $intent;
        
    }


    elseif($url[0]=='Product'){
        Product::showProduct();
        Product::productView();
        
        }
    elseif ($url[0]=='Article') {
        var_dump($url);

        if(isset($url[1])){
           Article::GetArticle($url[1]);
        }
            Article::viewArticle();
        }   
        // elseif ($url[0] =='cart') {
        //     Cart::showCart();
        //     Cart::viewCart();
        //     $cart=new Cart ;
        //     $cart->MontantGlobal();
        //     $cart->supprimerArticle($_SESSION['panier']['libelleProduit']);
        //     $cart->modifierQteArticle($_SESSION['panier']['libelleProduit'],$_SESSION['panier']['qteProduit']);
            

        // }
    }


    public static function checkoutSession()
    {
        if (!isset($_SESSION['user'])) {
            header('Location:./');
        }
    }

    public static function adminSession()
    {
        if ($_SESSION['user']['id_droits'] = 1) {
            header('Location:./');
        }
    }
    public static function disconnect()
    {
        session_unset();
        session_destroy();
        header('Location:./');
    }
    public static function secureArticle($url)
    {
        $checkArticle = new Model();
        $test = $checkArticle->articleCheck($url);
        if ($test == 0) {
            header('Location:../Product');
        }
    }
   
}
