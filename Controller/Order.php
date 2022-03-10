<?php 
require('Model/Commande.php');

class Order{
    function __construct(){

    }
    public static function orderView(){
        $message='';
        require('view/order.php');
    }
    public static function payment(){
        $prix=Cart::MontantGlobal();
        return $prix;
    }

    public function OrderPay(){

      $prix= Order::payment();

        if(isset($prix)){
            require_once('vendor/autoload.php');
            // On instancie Stripe
            Stripe\Stripe::setApiKey('sk_test_51KRulFAhAIqaLL5QDy2nlZuYkPtfJcbj3ozmH4ojUteGeWKfoIkS84aGaQFfHCkUTqZaW4eyJ6MNkU88E4FRJvEo00nPT925Hr');

            $intent = Stripe\PaymentIntent::create([
                'amount' => $prix*100,
                'currency' => 'eur'
            ]);
            return $intent;
        }
    }
 public static function validation(){
     if (isset($_POST['payez'])) {
         $commande=new Commande;
         $commande->saveOrder($_POST['id'],$_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['pays']);

}
     }
 public function foreach(){
    


 }
    
 public function test(){
     $test=new Commande;
     $result=$test->getExample();
     print_r($result[0]) ;
 }

}