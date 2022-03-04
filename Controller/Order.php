<?php 
require('Model/Commande.php');

class Order{
    function __construct(){

    }
    public static function orderView(){
        $message='';
        require('view/order.php');
    }

    public function OrderPay(){
        $order=new Commande();
        $prix=$order->pay();
        if(isset($prix)){
            require_once('vendor/autoload.php');
            // On instancie Stripe
            Stripe\Stripe::setApiKey('sk_test_51KRulFAhAIqaLL5QDy2nlZuYkPtfJcbj3ozmH4ojUteGeWKfoIkS84aGaQFfHCkUTqZaW4eyJ6MNkU88E4FRJvEo00nPT925Hr');

            $intent = Stripe\PaymentIntent::create([
                'amount' => $prix,
                'currency' => 'eur'
            ]);
            return $intent;
        }
        else{
            header('Location: /index.php');
        }
    }
}