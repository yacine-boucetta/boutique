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
                    $qteProd= +1 ;
                    $cart=new Cart;
                    $cart->addToCart($key['nom'],$qteProd,$key['prix']);
                    var_dump($_SESSION['panier']);
                }
                
            }
    
}
