<?php

class Panier extends Model
{

    public $fk_id_commande;
    public $fk_id_produit;
    public $fk_prix_prod;
    public $qte_prod;
    function __construct()
    {
        parent::__construct($this->db);
    }
    public function addpanier()
    {
        foreach ($_SESSION['panier']['id'] as $id => $values) {


            // var_dump($id);
            $insert = $this->db->prepare("INSERT INTO panier (fk_id_produit)VALUES($values)");
            $insert->execute();
            if ($insert = true) {
                foreach ($_SESSION['panier']['qteProduit'] as $quantite => $qte) {
                    var_dump($quantite);
                    $update = $this->db->prepare("UPDATE `panier` SET quantite_produit = $qte WHERE fk_id_produit = $values");
                    $update->execute();
                }
            }
            // var_dump($id);
            // var_dump($values);

        }

        // foreach ($_SESSION['panier']['prixProduit'] as $prix) {
        //     $fkprix=$prix;
        //     return $fkprix;
        // }

    }
}
