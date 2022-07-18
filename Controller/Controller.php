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
        // var_dump($test);
        Profil::viewProfil();
        
        
    }  elseif ($url[0] == 'Admin') {   
        Admin::deleteCateg();
        Admin::deleteSubCateg();
        Product::deleteProducts();
        Admin::adminView();
        Product::updateCategorie();
        Product::updateImage();
        Product::addImg();
        Admin::deleteUser();
        Admin::modUser();
    }
    elseif ($url[0]== 'order') {
        $order=new Order;
        Order::orderView();
        @ $order->validation(htmlspecialchars($_POST['idUser']),htmlspecialchars($_POST['prenom']),
        htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['email']),htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['cp']),
        htmlspecialchars($_POST['ville']),htmlspecialchars($_POST['pays']),htmlspecialchars($_POST['date']),
        htmlspecialchars($_POST['totalProd']),htmlspecialchars($_POST['totalPrix']));
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
        elseif ($url[0]=='404') {
            header('location: ./404');
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
