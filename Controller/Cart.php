<?php

class Cart{
   function creationPanier(){
      if (!isset($_SESSION['panier'])){
         $_SESSION['panier']=array();
         $_SESSION['panier']['libelleProduit'] = array();
         $_SESSION['panier']['qteProduit'] = array();
         $_SESSION['panier']['prixProduit'] = array();
         
      }
      return true;
   }
   public function addToCart($libelleProduit,$qteProduit,$prixProduit){
      if ($this->creationPanier()){
         //Si le produit existe déjà on ajoute seulement la quantité
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
        
         if ($positionProduit == true)
         {
            $_SESSION['panier']['qteProduit']++ ;
            var_dump($_SESSION);
            var_dump($qteProduit);
            // $_SESSION['panier']['qteProduit'] = $qteProduit ;
         }
         else
         {
            //Sinon on ajoute le produit
            array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
            array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
            array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
         }
      }
      else
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }
   
    public function supprimerArticle($libelleProduit){
        //Si le panier existe
        if (!empty($_SESSION['panier'])){
           //Nous allons passer par un panier temporaire
           $tmp=array();
           $tmp['libelleProduit'] = array();
           $tmp['qteProduit'] = array();
           $tmp['prixProduit'] = array();
           $tmp['verrou'] = $_SESSION['panier']['verrou'];
     
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
        }
        else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
     }
     function modifierQteArticle($libelleProduit,$qteProduit){
        //Si le panier existe
        if (!empty($_SESSION['panier']))
        {
           //Si la quantité est positive on modifie sinon on supprime l'article
           if ($qteProduit > 0)
           {
              //Recherche du produit dans le panier
              $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
     
              if ($positionProduit !== false)
              {
                 $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
              }
           }
           else
           $_SESSION['panier']->supprimerArticle($libelleProduit);
        }
        else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
     }

}