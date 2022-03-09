<?php
require 'assets/template/header.php';
$order=new Order;
$id=$_SESSION['user']['id'];
$cart=new Cart;
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Paiement</title>
    </head>
    <body>
        <form method="post">
            <input type="hidden" name='id' value="<?php $id ?>">
            <input type="text" name="prenom" value="<?php echo $_SESSION['user']['prenom'] ?>">
            <input type="text" name="nom" value="<?php echo $_SESSION['user']['nom'] ?>">
            <input type="text" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
            <input type="text" name="adresse" placeholder="adresse">
            <input type="text" name="cp" placeholder="code postale">
            <input type="text" name="ville" placeholder="ville">
            <input type="text" name="pays" placeholder="pays">
            <?= $cart->countProd(); ?>
            <?php $intent=$order->OrderPay()?>
            <div id="errors"></div><!--Contiendra les messages d'erreur de paiement-->
            <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
            <div id="card-elements"></div><!--Contiendra le formulaire de saisie des informations de carte-->
            <div id="card-errors" role="alert"></div><!--Contiendra les erreurs relatives à la carte-->
            <p><?php echo Cart::MontantGlobal()?>€</p>
            <button id="card-button" type="button" name="payez" data-secret="<?= $intent['client_secret'] ?>">Procéder au paiement</button>
            
        </form>
    
        <script src="https://js.stripe.com/v3/"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>