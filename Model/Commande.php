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
public function saveOrder($id,$nom,$prenom,$email,$adresse,$cp,$ville,$pays){

    $insert=$this->db->prepare("INSERT INTO commandes(id_utilisateur,nom,prenom,email,code_postal,ville,pays,date,adresse_livraison,qte_produits,prix_total,id_produits) VALUES(:id,:nom,:prenom,:email,:cp,:ville,:pays)");
    $insert->bindValue(':id',$id,PDO::PARAM_INT);
    $insert->bindValue(':nom',$nom,PDO::PARAM_STR);
    $insert->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $insert->bindValue(':email',$email,PDO::PARAM_STR);
    $insert->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $insert->bindValue(':cp',$cp,PDO::PARAM_INT);
    $insert->bindValue(':ville',$ville,PDO::PARAM_STR);
    $insert->bindValue(':pays',$pays,PDO::PARAM_STR);
    $insert->execute();

}
public function getExample(){

    $select=$this->db->prepare("SELECT * FROM example");
    $select->execute();
    $result=$select->fetchAll(PDO::FETCH_ASSOC);
    return $result;


}

}
