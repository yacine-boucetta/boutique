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
 public function validation($idUser,$nom,$prenom,$email,$adresse,$cp,$ville,$pays,$qteProd,$finalPrice){
     if (isset($_POST['payez'])) {
         if(empty($_POST['prenom'])||empty($_POST['nom'])||empty($_POST['email'])||empty($_POST['adresse'])||empty($_POST['cp'])||empty($_POST['ville'])||empty($_POST['pays'])){
             echo "veuillez remplir tous les champs";
         }
         else{
         $commande=new Commande;
       @ $commande->saveOrder(htmlspecialchars($_POST['idUser']),htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['email']),htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['cp']),htmlspecialchars($_POST['ville']),htmlspecialchars($_POST['pays']),htmlspecialchars($_POST['date']),htmlspecialchars($_POST['totalProd']),htmlspecialchars($_POST['totalPrix']));
       echo "<script>window.location.href='./';</script>";
       exit;
        
         }

     }
 }
 
}