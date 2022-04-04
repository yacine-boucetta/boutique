<?php
require 'assets/template/header.php';
$order=new Order;
$id=$_SESSION['user']['id'];
$cart=new Cart;
$test=count($_SESSION['panier']['id']);
var_dump($test);


?>

    <body>
        <form method="POST">
            <input type="hidden" name='idUser' value="<?= $id ?>">
            <input type="hidden" name="date" value="<?= date("Y-m-d h:i:s")?>">
            <input type="text" name="nom" value="<?php echo $_SESSION['user']['prenom'] ?>">
            <input type="text" name="prenom" value="<?php echo $_SESSION['user']['nom'] ?>">
            <input type="text" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
            <input type="text" name="adresse" placeholder="adresse">
            <input type="number" name="cp" placeholder="code postale">
            <input type="text" name="ville" placeholder="ville">
            <input type="text" name="pays" placeholder="pays">
            <input type="number"value="<?= $cart->countProd()?>"name="totalProd">
            <input type="number"value="<?= $cart->MontantGlobal()?>"name="totalPrix">
            <?php $intent=$order->OrderPay()?>
            <div id="errors"></div><!--Contiendra les messages d'erreur de paiement-->
            <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
            <div id="card-elements"></div><!--Contiendra le formulaire de saisie des informations de carte-->
            <div id="card-errors" role="alert"></div><!--Contiendra les erreurs relatives à la carte-->
            <p><?= Cart::MontantGlobal()?>€</p>
            <input id="card-button" type="submit" name="payez" data-secret="<?= $intent['client_secret'] ?>">
                        
        </form>
    
        <script src="https://js.stripe.com/v3/"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>