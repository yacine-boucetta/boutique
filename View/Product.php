<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $prod = Product::showProduct();
    foreach ($prod as $product) { ?>
        <form method="get" action=Article.php>
            <div class="card"><?= var_dump($product['id']); ?>
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