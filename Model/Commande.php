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
public function saveOrder($idUser,$nom,$prenom,$email,$adresse,$cp,$ville,$pays,$date,$qteProd,$finalPrice){

    $insert=$this->db->prepare("INSERT INTO commandes(id_utilisateur,nom,prenom,email,code_postal,ville,pays,date,adresse_livraison,qte_produits,prix_total) VALUES(:idUser,:nom,:prenom,:email,:cp,:ville,:pays,:date,:adresse,:totalProd,:totalPrix");
    $insert->bindValue(':idUser',$idUser,PDO::PARAM_INT);
    $insert->bindValue(':nom',$nom,PDO::PARAM_STR);
    $insert->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $insert->bindValue(':email',$email,PDO::PARAM_STR);
    $insert->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $insert->bindValue(':cp',$cp,PDO::PARAM_INT);
    $insert->bindValue(':ville',$ville,PDO::PARAM_STR);
    $insert->bindValue(':pays',$pays,PDO::PARAM_STR);
    $insert->bindValue(':date',$date,PDO::PARAM_STR);
    $insert->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $insert->bindValue(':totalProd',$qteProd,PDO::PARAM_INT);
    $insert->bindValue(':totalPrix',$finalPrice,PDO::PARAM_INT);
    $insert->execute();
    var_dump($_POST['adresse']);
}
public function test(){}

}
