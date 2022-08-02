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
?>      <main>
            <div class="article">
            <h1><?= $key['nom'] ?></h1>
                <form action="" id="formArt" method="POST">
                    <input type="hidden" value="<?= $key['id'] ?>" >
                    <div class="article2">
                    <img src=".<?= $key['image'] ?>">
                    <div class="desc">
                    <p><?= $key['description'] ?></p>
                    <p><?= $key['prix'] ?>€</p>
                    </div>
                    <input type="submit" name="addToCart" id="mybuton" value="ajouter au panier">
                    </div>
                </form>
            </div>
            </main>   <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Gashido</h5>

                    <p>
                    Gashido knife makers offers you a wide range of japanesse pocket knives 
                    handmade in France.
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Gashido</h5>

                    <p>
                        
                    Welcome to our 3rd edition of the USAknifemaker.com catalog. 
                    This release weighs in at nearly double the page count of our 
                    first catalog with the addition of thousands of new items since our first release.
                    Our goal is simple. We want to be the very best supplier for you in your knife making hobby or profession.
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
    </footer><?php
                
                if (isset($_POST['addToCart'])) {
                    $cart=new Cart;
                    $cart->addToCart($key['id'],$key['nom'],1,$key['prix']);

                }

                    
                }
            }
}
