<?php 

class Commande extends Model{
    private $id;
    public  $idUser;
    public  $idProduct;
    public  $adresse;
    public  $date;
    public  $qteProduct;
    public  $qteTotal;
    public  $finalPrice;

    public function __construct(){
    parent::__construct($this->db);
}
public function pay(){
    $getorder=$this->db->prepare("SELECT * FROM commandes");
    $getorder->execute();
    $result=$getorder->fetch();
   return $result['prix_total'];
    
} 
}
