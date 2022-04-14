<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/produits.css">
    <title>Document</title>
</head>
<?php ?>

<body>
<header style="color: white;">

    <nav class="navbar navbar-expand-lg ">
  <a  href="#">GASHIDO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Les produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">admin</a>
      </li>

    </ul>
  </div>
</nav>

    </header>
    <main class="mainProd">
    
        <?php
        $prod = Product::showProduct();
        foreach ($prod as $product) { ?>
        <form method="get" action=Article.php class="formProd">
                <div class="card">
                    <a href="./Article/<?= $product['id'] ?>">
                        <input type="hidden" name="" value=<?= $product['id'] ?>>
                        <h2><?= $product['nom'] ?></h2>
                        <img src="<?= $product['image'] ?>" alt="">
                        <p><?= $product['description'] ?></p>
                        <p><?= $product['prix'] ?>€</p>
                    </a>
                </div>
                </form>
        <?php } ?>
        
    </main>
</body>

</html>