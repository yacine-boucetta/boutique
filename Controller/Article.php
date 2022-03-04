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
            <div>
                <form action="" method="POST">
                    <h1><?= $key['nom'] ?></h1>
                    <img src=".<?= $key['image'] ?>">
                    <h1><?= $key['description'] ?></h1>
                    <h1><?= $key['prix'] ?></h1>
                    <input type="submit" name="addToCart">
                </form>
            </div><?php
                }
                if (isset($_POST['addToCart'])) {
                    // $qteprod=1;
                    $cart=new Cart;
                    // $_SESSION['panier']['libelleProduit']=[$key['nom']];
                    // $_SESSION['panier']['qteProduit']=[$qteprod];
                    // $_SESSION['panier']['prixProduit']=[$key['prix']];
                    $cart->addToCart($key['nom'],1,$key['prix']);

                }
                var_dump($_SESSION['panier']);
            }
}
