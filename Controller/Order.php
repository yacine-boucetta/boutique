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
    public function addliaison($libelleProduit){
        $libelleProduit=$_SESSION['panier']['id'];
        var_dump($libelleProduit);
        var_dump($_SESSION['panier']);
        foreach ($libelleProduit as $article) {
           
        }
    }
 public static function validation($id,$nom,$prenom,$email,$adresse,$cp,$ville,$pays,$date,$qteProd,$finalPrice){
     if (isset($_POST['payez'])) {
         $commande=new Commande;
        $toto= $commande->saveOrder($id,$nom,$prenom,$email,$adresse,$cp,$ville,$pays,$date,$qteProd,$finalPrice);
        return $toto;
     }

    


 }

}