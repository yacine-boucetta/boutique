<?php

class Cart{




   public static function viewCart(){
      require('view/cart.php');
  }

   public static function creationPanier(){
      if (!isset($_SESSION['panier'])){
         $_SESSION['panier']=array();
         $_SESSION['panier']['libelleProduit'] = array();
         $_SESSION['panier']['qteProduit'] = array();
         $_SESSION['panier']['prixProduit'] = array();
         
      }
      return true;
   }
   public static function showCart(){
      if (Cart::creationPanier()){
         $nbArticles=count($_SESSION['panier']['libelleProduit']);
         if ($nbArticles <= 0)
         echo "<tr><td>Votre panier est vide </ td></tr>";
         else{
             for ($i=0 ;$i < $nbArticles ; $i++){?>
                 <tr>
                 <td><?=$_SESSION['panier']['libelleProduit'][$i]?></td>
                 <td>
                    <form method="POST">
                       <input type="submit" value="-" name="delete<?php $_SESSION['panier']['libelleProduit'][$i]?>">
                       <input type="text" size="4" name= "qteProd"value=<?=$_SESSION['panier']['qteProduit'][$i]?>>
                        <input type=submit value="+" name="add">
                  </form>
                  </td>
                 <td><?=$_SESSION['panier']['prixProduit'][$i]*$_SESSION['panier']['qteProduit'][$i]?></td>
                 
                 </tr><?php
              
              if (isset($_POST['supp'])) {
               $cart=new Cart;
               $cart->supprimerArticle($_SESSION['panier']['libelleProduit'][$i]);
               }
               if (isset($_POST['delete'])||isset($_POST['add'])) {
                  $cart=new Cart;
                  $cart->modifierQteArticle($_SESSION['panier']['libelleProduit'][$i],$_SESSION['panier']['qteProduit'][$i]);
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
                
             }
         }
     }
    
    }
   public function addToCart($libelleProduit,$qteProduit,$prixProduit){
      if (Cart::creationPanier()){
         //Si le produit existe déjà on ajoute seulement la quantité
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
      //   var_dump($positionProduit);
         if (isset($positionProduit) && $positionProduit!==false){
         $_SESSION['panier']['qteProduit'][$positionProduit] = $_SESSION['panier']['qteProduit'][$positionProduit]+1;
         // var_dump($_SESSION['panier']['qteProduit'][$positionProduit]);
      }
         else{
            //Sinon on ajoute le produit
            array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
            array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
            array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
         }
      }
      else{
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";}
   }
   
   public function supprimerArticle($libelleProduit){
        //Si le panier existe
        if (isset($_POST['supp'])) {
           
        
        if (!empty($_SESSION['panier'])){
           //Nous allons passer par un panier temporaire
           $tmp=array();
           $tmp['libelleProduit'] = array();
           $tmp['qteProduit'] = array();
           $tmp['prixProduit'] = array();
     
           for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++){
              if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit){
                 array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                 array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                 array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
              }
           }
           //On remplace le panier en session par notre panier temporaire à jour
           $_SESSION['panier'] =  $tmp;
           //On efface notre panier temporaire
           unset($tmp);
           header("refresh: 0.5");
        }
        else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }
}
   public static function MontantGlobal(){
      $total=0;
      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
      }
      echo $total ?> € <?php ;
   }

   public function modifierQteArticle($libelleProduit,$qteProduit){
      if (isset($_POST['delete'])) {
         if ($qteProduit>0) {
            $positionProduit=array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);
            if ($positionProduit!==false) {
               $_SESSION['panier']['qteProduit'][$positionProduit]=$qteProduit -1;
               if ($qteProduit == 0) {
                  $cart=new Cart;
                  $cart->supprimerArticle($_SESSION['panier']['libelleproduit']);
               }
            }
         }
         header("refresh: 0.5");
      }
      if (isset($_POST['add'])) {
         if ($qteProduit >=1) {
            $positionProduit=array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);
            if ($positionProduit!==false) {
               $_SESSION['panier']['qteProduit'][$positionProduit]=$qteProduit +1;
         }
      }
      header("refresh: 0.5");
   }
}
   //   function modifierQteArticle($libelleProduit,$qteProduit){
   //      //Si le panier existe
   //      if (isset($_POST['delete'])|| isset($_POST['add'])){
   //         //Si la quantité est positive on modifie sinon on supprime l'article
   //         if ($qteProduit > 0){
   //            //Recherche du produit dans le panier
   //            $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
     
   //            if ($positionProduit !== false)
   //            {
   //               $_SESSION['panier']['qteProduit'][$positionProduit]  = $qteProduit  ;
               
   //            }
   //         }
   //         else
   //         $_SESSION['panier']->supprimerArticle($libelleProduit);
   //      }
   //      else
   //      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   //   }

}