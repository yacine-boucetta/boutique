<?php

$order = new Order;
$id = $_SESSION['user']['id'];
$cart = new Cart;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/order.css">
    <title>PAIEMENT</title>
</head>
<?php ?>

<body>
    <header>
        <nav class="navbar">
            <h1>GASHIDO</h1>
            <ul>
                <li><a href='./Product'>product</a></li>
                <li><a href='./SignUp'>inscription</a></li>
                <li><a href='./SignIn'>connexion</a></li>
                <li><a href='./Product'>product</a></li>
                <li><a href='./Admin'>admin</a></li>
                <li><a href='./Profil'>profil</a></li>
                <li><a href='./Deconnexion'>deconnexion</a></li>
            </ul>
            <form action="" method="post" class="search">
                <input type="text" name="query" />
                <input type="submit" value="Search" />
            </form>
            <h2>INFORMATION PAIEMENT</h2>
            <form method="POST">
                <div class="delivery">
                <input type="hidden" name='idUser' value="<?= $id ?>">
                <input type="hidden" name="date" value="<?= date("Y-m-d h:i:s") ?>">
                <input type="text" name="nom" value="<?php echo $_SESSION['user']['prenom'] ?>">
                <input type="text" name="prenom" value="<?php echo $_SESSION['user']['nom'] ?>">
                <input type="text" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
                <input type="text" name="adresse" placeholder="adresse">
                <input type="number" name="cp" placeholder="code postale">
                <input type="text" name="ville" placeholder="ville">
                <input type="text" name="pays" placeholder="pays">
                <input type="number" value="<?= $cart->countProd()?>" name="totalProd" disabled>
                <input type="number" value="<?= $cart->MontantGlobal() ?>" name="totalPrix"disabled>
                </div>
                <?php $intent = $order->OrderPay() ?>
                <div class="carte">
                <div id="errors"></div>
                <!--Contiendra les messages d'erreur de paiement-->
                <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
                <div id="card-elements"></div>
                <!--Contiendra le formulaire de saisie des informations de carte-->
                <div id="card-errors" role="alert"></div>
                <!--Contiendra les erreurs relatives à la carte-->
                <p><?= Cart::MontantGlobal() ?>€</p>
                <input id="card-button" type="submit" name="payez" data-secret="<?= $intent['client_secret'] ?>">
                </div>
            </form>
            <footer>
                
            </footer>
            <script src="https://js.stripe.com/v3/"></script>
            <script src="js/scripts.js"></script>
</body>

</html>