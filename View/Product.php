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

        </nav>
    </header>
    <?php
    $prod = Product::showProduct();
    foreach ($prod as $product) { ?>
        <form method="get" action=Article.php>
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
</body>

</html>