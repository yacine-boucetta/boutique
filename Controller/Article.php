<?php
require 'Model/Products.php';

class Article
{
    public static function viewArticle(){
        require('view/article.php');
    }

    public static function GetArticle($id){
        $produit = new Products;
        $idArticle = $produit->getAllInfo($id);
        foreach ($idArticle as $key) {
?>
            <div class="article">
            <h1><?= $key['nom'] ?></h1>
                <form action="" method="POST">
                    <input type="hidden" value="<?= $key['id'] ?>" >
                    <div class="article2">
                    <img src=".<?= $key['image'] ?>">
                    <div class="desc">
                    <p><?= $key['description'] ?></p>
                    <p><?= $key['prix'] ?>€</p>
                    </div>
                    <input type="submit" name="addToCart">
                    </div>
                </form>
            </div><?php
                
                if (isset($_POST['addToCart'])) {


                    $cart=new Cart;
                    $cart->addToCart($key['id'],$key['nom'],1,$key['prix']);

                }

                    
                }
            }
}
