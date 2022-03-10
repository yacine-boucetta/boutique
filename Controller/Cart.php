<?php

<<<<<<< HEAD
class Cart
{
   public static function creationPanier()
   {
      if (!isset($_SESSION['panier'])) {
         $_SESSION['panier'] = array([]);
=======

class Cart{




   public static function viewCart(){
      require('view/cart.php');
  }

   public static function creationPanier(){
      if (!isset($_SESSION['panier'])){
         $_SESSION['panier']=array();
         $_SESSION['panier']['id']=array();
>>>>>>> origin/paiment
         $_SESSION['panier']['libelleProduit'] = array();
         $_SESSION['panier']['qteProduit'] = array();
         $_SESSION['panier']['prixProduit'] = array();
      }
      return true;
   }
<<<<<<< HEAD
   public function addToCart($libelleProduit, $qteProduit, $prixProduit)
   {
      if (Cart::creationPanier()) {
=======
   public function addToCart($id,$libelleProduit,$qteProduit,$prixProduit){
      if (Cart::creationPanier()){
>>>>>>> origin/paiment
         //Si le produit existe déjà on ajoute seulement la quantité
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
         //   var_dump($positionProduit);
         if (isset($positionProduit) && $positionProduit !== false) {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $_SESSION['panier']['qteProduit'][$positionProduit] + 1;
            // var_dump($_SESSION['panier']['qteProduit'][$positionProduit]);
         } else {
            //Sinon on ajoute le produit
<<<<<<< HEAD
            array_push($_SESSION['panier']['libelleProduit'], $libelleProduit);
            array_push($_SESSION['panier']['qteProduit'], $qteProduit);
            array_push($_SESSION['panier']['prixProduit'], $prixProduit);
=======
            array_push($_SESSION['panier']['id'],$id);
            array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
            array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
            array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
>>>>>>> origin/paiment
         }
      } else {
         echo "Un problème est survenu veuillez contacter l'administrateur du site.";
      }
   }

   public static function showCart()
   {
      if (Cart::creationPanier()) {
         $nbArticles = count($_SESSION['panier']['libelleProduit']);
         if ($nbArticles <= 0)
            echo "<tr><td>Votre panier est vide </ td></tr>";
         else {
            for ($i = 0; $i < $nbArticles; $i++) { ?>
               <tr>
                  <td><?= $_SESSION['panier']['libelleProduit'][$i] ?></td>
                  <td>
                     <form method="POST">
                        <input type="hidden" value=<?= $i ?> name="id">
                        <input type="submit" value="-" name="delete">
                        <input type="text" size="4" name="qteProd" value=<?= $_SESSION['panier']['qteProduit'][$i] ?>>
                        <input type=submit value="+" name="add">
                     </form>
                  </td>
                  <td><?= $_SESSION['panier']['prixProduit'][$i] * $_SESSION['panier']['qteProduit'][$i] ?></td>

               </tr><?php
                     echo $i;
                     if (isset($_POST['supp'])) {
                        $cart = new Cart;
                        $cart->supprimerArticle($_SESSION['panier']['libelleProduit'][$i]);
                     }
                     if (isset($_POST['delete']) || isset($_POST['add'])) {
                        $cart = new Cart;
                        $cart->modifierQteArticle($_SESSION['panier']['libelleProduit'][$i], $_SESSION['panier']['qteProduit'][$i]);
                     }
                     var_dump($_SESSION['panier']);
                  } ?>
            <form method="POST">
               <input type="submit" name="supp" value="supprimez">
            </form>
            <form method="POST">
               <input type="submit" name="pay" value="paimment">
            </form>
<?php
            if (isset($_POST['pay'])) {
               Cart::payCart();
            }
         }
      }
   }
   public function modifierQteArticle($libelleProduit, $qteProduit)
   {
      if (isset($_POST['delete'])) {
         if ($qteProduit > 0) {
            $positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
            if ($positionProduit !== false) {
               if ($_POST['id'] == $positionProduit) {
                  $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit - 1;
               }
               if ($qteProduit == 0) {
                  $cart = new Cart;
                  $cart->supprimerArticle($_SESSION['panier']['libelleproduit'][$positionProduit]);
               }
            }
         }
         header("refresh: 0.5");
      }
      if (isset($_POST['add'])) {
         if ($qteProduit >= 1) {
            $positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
            if ($positionProduit !== false) {
               if ($_POST['id'] == $positionProduit) {
                  $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit + 1;
               }
            }
         }
         // header("refresh: 0.5");
         var_dump(array_sum($_SESSION['panier']['qteProduit']));
      }
   }
   public static function countProd()
   {
      $count = array_sum($_SESSION['panier']['qteProduit']);
      return $count;
   }
   public function supprimerArticle($libelleProduit)
   {
      //Si le panier existe
      if (isset($_POST['supp'])) {


         if (!empty($_SESSION['panier'])) {
            //Nous allons passer par un panier temporaire
            $tmp = array();
            $tmp['libelleProduit'] = array();
            $tmp['qteProduit'] = array();
            $tmp['prixProduit'] = array();

            for ($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++) {
               if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit) {
                  array_push($tmp['libelleProduit'], $_SESSION['panier']['libelleProduit'][$i]);
                  array_push($tmp['qteProduit'], $_SESSION['panier']['qteProduit'][$i]);
                  array_push($tmp['prixProduit'], $_SESSION['panier']['prixProduit'][$i]);
               }
            }
            //On remplace le panier en session par notre panier temporaire à jour
            $_SESSION['panier'] =  $tmp;
            //On efface notre panier temporaire
            unset($tmp);
            header("refresh: 0.5");
         } else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
      }
   }
   public static function MontantGlobal()
   {
      $total = 0;
      for ($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++) {
         $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
      }

      return $total;
   }
   public static function payCart()
   {
      header("location: ./order");
   }
}
