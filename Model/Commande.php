<?php 

class Commande extends Model{
    private $id;
    public  $idUser;
    public $nom;
    public $prenom;
    public $email;
    public $cp;
    public $ville;
    public $pays;
    public  $adresse;
    public  $date;
    public  $qteProd;
    public  $finalPrice;

    public function __construct(){
    parent::__construct($this->db);
}
public function saveOrder($idUser,$nom,$prenom,$email,$adresse,$cp,$ville,$pays,$qteProd,$finalPrice){

    $insert=$this->db->prepare("INSERT INTO `commandes`(id_utilisateur,nom,prenom,email,code_postal,ville,pays,date,adresse_livraison,qte_produits,prix_total)
    VALUES(:idUser,:nom,:prenom,:email,:cp,:ville,:pays,:date,:adresse,:totalProd,:totalPrix)");
    $insert->execute(array(
        ':idUser'=>$idUser,
        ':nom'=>$nom, 
        ':prenom'=>$prenom,
        ':email'=>$email,
        ':adresse'=>$adresse,
        ':cp'=>$cp,
        ':ville'=>$ville,
        ':pays'=>$pays,
        ':date'=>date("Y-m-d H:i:s"),
        ':totalProd'=>$qteProd,
        ':totalPrix'=>$finalPrice
    ));
}
public function test(){}

}
