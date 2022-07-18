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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/order.css">
  <title>PAIEMENT</title>
</head>
<?php ?>

<body>
  <header>

    <nav class="navbar navbar-expand-lg bg-light ">
      <a class="navbar-brand" href="#">GASHIDO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="./">Acceuil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Product">Les produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cart">Panier</a>
          </li>
          <?php
          if (!(isset($_SESSION['user']))) {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./SignUp'>inscription</a>
                                </li>";
          }
          if (!(isset($_SESSION['user']))) {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./SignIn'>connexion</a>
                                </li>";
          }
          if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./Profil'>profil</a>
                                </li>";
          }
          if (isset($_SESSION['user']) && $_SESSION['user'] == "2") {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./Admin'>admin</a>
                                </li>";
          }
          ?>
        </ul>
      </div>
    </nav>

  </header>
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
      <input type="number" value="<?= $cart->countProd() ?>" name="totalProd">
      <input type="number" value="<?= $cart->MontantGlobal() ?>" name="totalPrix">
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
  <footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Footer text</h5>

          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
            aliquam voluptatem veniam, est atque cumque eum delectus sint!
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Footer text</h5>

          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
            aliquam voluptatem veniam, est atque cumque eum delectus sint!
          </p>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/%22%3EMDBootstrap.com"></a>
    </div>
    <!-- Copyright -->
  </footer>

  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/scripts.js"></script>
</body>


</html>