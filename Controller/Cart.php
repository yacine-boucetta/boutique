<?php


class Cart
{
   public static function viewCart()
   {
      require('view/cart.php');
   }
   public static function creationPanier()
   {
      if (!isset($_SESSION['panier'])) {
         $_SESSION['panier'] = array();
         $_SESSION['panier']['id'] = array();
         $_SESSION['panier']['libelleProduit'] = array();
         $_SESSION['panier']['qteProduit'] = array();
         $_SESSION['panier']['prixProduit'] = array();
      }
      return true;
   }
   public function addToCart($id, $libelleProduit, $qteProduit, $prixProduit)
   {
      if (Cart::creationPanier()) {
         //Si le produit existe déjà on ajoute seulement la quantité
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
         //   var_dump($positionProduit);
         if (isset($positionProduit) && $positionProduit !== false) {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $_SESSION['panier']['qteProduit'][$positionProduit] + 1;
            // var_dump($_SESSION['panier']['qteProduit'][$positionProduit]);
         } else {
            //Sinon on ajoute le produit
            array_push($_SESSION['panier']['id'], $id);
            array_push($_SESSION['panier']['libelleProduit'], $libelleProduit);
            array_push($_SESSION['panier']['qteProduit'], $qteProduit);
            array_push($_SESSION['panier']['prixProduit'], $prixProduit);
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
            echo "<div class=error><h2>Votre panier est vide </h2></div>";
         else { ?>
            <div class="essaie">
               <div >
               <table >
                  <tbody>

                     <?php
                     for ($i = 0; $i < $nbArticles; $i++) { ?>
                          
                              <tr>

                                 <td>
                                    <h2><?= $_SESSION['panier']['libelleProduit'][$i] ?></h2>
                                 </td>
                                 <form method="POST" class="produit">
                                 <td > <input type="hidden" value=<?= $i ?> name="id"></td>
                                 <td> <input type="submit" value="-" name="delete" class="delete"></td>
                                 <td> <input type="text" size="4" name="qteProd" class="qd" value=<?= $_SESSION['panier']['qteProduit'][$i] ?>></td>
                                 <td> <input type=submit value="+" name="add" class="add"></td>
                                 <td>
                                    <p><?= $_SESSION['panier']['prixProduit'][$i] * $_SESSION['panier']['qteProduit'][$i] ?>€</p>
                                 </td>
                                 <td> <input type="submit" class="supp" name="supp" value="videz le panier"></td>
                              </tr>
                           </form>
                        <?php
                        if (isset($_POST['supp'])) {
                           $cart = new Cart;
                           $cart->supprimerArticle($_SESSION['panier']['libelleProduit'][$i]);
                        }
                        if (isset($_POST['delete']) || isset($_POST['add'])) {
                           $cart = new Cart;
                           $cart->modifierQteArticle($_SESSION['panier']['libelleProduit'][$i], $_SESSION['panier']['qteProduit'][$i]);
                        }
                        // var_dump($_SESSION['panier']);
                     }?>
                  </tbody>
               </table>
               </div>
               <div class="mg">
               <p class="montant">Montant Total </p>
               <p class="montant"> <?= Cart::MontantGlobal() ?>€</p>
               <form method="POST" class="pay">
                  <input type="submit" name="paye" value="validez panier">
               </form>
            </div>
          </div>
<?php
            if (isset($_POST['paye'])) {
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
         header("refresh: 0.5");
         // var_dump(array_sum($_SESSION['panier']['qteProduit'])) ;
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
      echo "<script>window.location.href='./order';</script>";
      exit;
   }
}
