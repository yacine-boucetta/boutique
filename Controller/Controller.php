<?php

class Controller
{



    function __construct()
    {
    }

    public static function searchBar($query)
    {
        $r = new Model();
        $s = $r->query($query);
        if (Count($s) > 0) {
            foreach ($s as $value) {
                echo "<a href='Article/" . $value['id'] . "'>" . $value['nom'] . "</a></br>";
            }           ;
        } else {
            echo "No results";
        }
    }


    public static function index($url)
    {
        if (empty($_POST['query'])) {
            $_POST['query'] = '';
        }
        Controller::searchbar(htmlspecialchars($_POST['query']));

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
        } elseif ($url[0] == 'Deconnexion') {
            Controller::disconnect();
        } elseif ($url[0] == 'Article') {

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


    public static function checkoutSession()
    {
        if (!isset($_SESSION['user'])) {
            header('Location:./Home');
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
