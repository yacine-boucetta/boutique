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
        
        //Admin::addCat();
        //Admin::addSubCat();
        Admin::deleteCateg();
        Admin::deleteSubCateg();
        Product::deleteProducts();
        Admin::adminView();
        //Product::updateProduct();
        Product::updateCategorie();
        Product::updateImage();
        Product::addImg();
        Admin::deleteUser();
        Admin::modUser();
        //Product::displayUpdate();
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
       @ $order->validation($_POST['idUser'],$_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['pays'],$_POST['date'],$_POST['totalProd'],$_POST['totalPrix']);
      
        $intent=$order->OrderPay();
        return $intent;
    }


    elseif($url[0]=='Product'){
        Product::showProduct();
        Product::productView();
        
        }
    elseif ($url[0]=='Article') {
        // var_dump($url);
        Article::viewArticle();
        if(isset($url[1])){
           Article::GetArticle($url[1]);
        }
            
        }   
        elseif ($url[0] =='cart') {
            // Cart::showCart();
            Cart::viewCart();
            $cart=new Cart ;
            $cart->MontantGlobal();
            $cart->supprimerArticle($_SESSION['panier']['libelleProduit']);
            $cart->modifierQteArticle($_SESSION['panier']['libelleProduit'],$_SESSION['panier']['qteProduit']);
         
            

        }
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
