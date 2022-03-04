
    <?php
    require 'assets/template/header.php';
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