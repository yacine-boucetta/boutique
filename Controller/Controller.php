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
        Order::orderView();
        $order->validation($_POST['idUser'],$_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['pays'],$_POST['date'],$_POST['totalProd'],$_POST['totalPrix']);
        var_dump($_POST);
        $intent=$order->OrderPay();
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
        elseif ($url[0] =='cart') {
            Cart::showCart();
            Cart::viewCart();
            $cart=new Cart ;
            $cart->MontantGlobal();
            $cart->supprimerArticle($_SESSION['panier']['libelleProduit']);
            $cart->modifierQteArticle($_SESSION['panier']['libelleProduit'],$_SESSION['panier']['qteProduit']);
            
        }
    }
   
}
