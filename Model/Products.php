<?php



    class Products extends Model{

        private $id;
        public $nom;
        public $description;
        public $id_sous_categories;
        public $id_categories;
        public $prix;
        public $id_droits;
        public $image;

        function __construct(){
            parent::__construct($this->db);
        }

        public function insertProd($nom ,$description ,$id_sous_categories, $id_categories, $prix, $image){

            $insertProd = $this->db->prepare("INSERT INTO produits (nom, description, id_sous_categories, id_categories, prix, image)
                VALUES (:nom, :description, :id_sous_categories, :id_categories, :prix, :image)");
                $insertProd->bindValue(':nom', $nom, PDO::PARAM_STR);
                $insertProd->bindValue(':description', $description, PDO::PARAM_STR);
                $insertProd->bindValue(':id_sous_categories', $id_sous_categories, PDO::PARAM_INT);
                $insertProd->bindValue(':id_categories', $id_categories, PDO::PARAM_INT);
                $insertProd->bindValue(':prix', $prix, PDO::PARAM_STR);
                $insertProd->bindValue(':image', $image, PDO::PARAM_STR);
                $insertProd->execute();

        }
        public function updateProd($id, $id_categories, $id_sous_categories, $nom ,$description , $prix){

            $insertProd = $this->db->prepare("UPDATE produits SET nom=:nom, description=:description ,id_sous_categories=:id_sous_categories ,id_categories=:id_categories ,prix=:prix WHERE id = :id");
                $insertProd->bindValue(':id', $id, PDO::PARAM_INT);
                $insertProd->bindValue(':nom', $nom, PDO::PARAM_STR);
                $insertProd->bindValue(':description', $description, PDO::PARAM_STR);
                $insertProd->bindValue(':id_sous_categories', $id_sous_categories, PDO::PARAM_INT);
                $insertProd->bindValue(':id_categories', $id_categories, PDO::PARAM_STR);
                $insertProd->bindValue(':prix', $prix, PDO::PARAM_INT);
                //$insertProd->bindValue(':image', $image, PDO::PARAM_STR);
                $insertProd->execute();

        }
        public function deleteProd($id){

            $deleteProd = $this->db->prepare("DELETE * FROM produits WHERE id = :id");
            $deleteProd->bindValue(':id', $id, PDO::PARAM_STR);
            $deleteProd->execute();

        }

        public function getAllInfos($id){
            $getAllInfos = $this->db->prepare("SELECT * FROM produits WHERE id = :id");
            $getAllInfos->bindValue(':id', $id, PDO::PARAM_STR);
            $getAllInfos->execute();
            $result=$getAllInfos->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }

        public function countProd($nom){
            $count = $this->db->prepare("SELECT * FROM produits WHERE `nom` = :nom");
            $count->bindValue(':nom', $nom, PDO::PARAM_STR);
            $count->execute();
            $result= $count->rowCount();
            var_dump($result);
            return $result;

        }
        public function getAllInfo($id){
            $getAllInfos = $this->db->prepare("SELECT * FROM produits WHERE id = :id");
            $getAllInfos->bindValue(':id', $id, PDO::PARAM_STR);
            $getAllInfos->execute();
            $result=$getAllInfos->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function updateImg($id, $image){
            $updateImg = $this->db->prepare("UPDATE `produits` SET image = :image WHERE id = :id");
            $updateImg->bindValue(':id', $id, PDO::PARAM_INT);
            $updateImg->bindValue(':image', $image, PDO::PARAM_STR);
            $updateImg->execute();
        }
        public function getImg($id){
            $getImg = $this->db->prepare("SELECT image FROM `produits` WHERE id = :id");
            $getImg->bindValue(':id', $id, PDO::PARAM_INT);
            $getImg->execute();
            $result = $getImg->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function getProdByCateg($id){
            $getProdByCateg = $this->db->prepare("SELECT * FROM `produits` INNER JOIN categories ON produits.id_categories = categories.id WHERE categories.id = :id");
            $getProdByCateg->bindValue(':id', $id,  PDO::PARAM_INT);
            $getProdByCateg->execute();
            $result = $getProdByCateg->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    }

?>