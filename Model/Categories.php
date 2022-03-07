<?php

    //require ('Model/Model.php' );

    class Categories extends Model{

        public $id;
        public $nom;

        function __construct(){
            parent::__construct($this->db);
        }
//------------------------------------------new Categories------------------------------------------------------
        public function insertCat($nom){
            $insertCat = $this->db->prepare("INSERT INTO `categories`(`nom`) VALUES (:nom)");
            $insertCat->bindValue(':nom',$nom, PDO::PARAM_STR);
            $insertCat->execute();
            echo 'cat model';
        }
//-------------------------------------------Display Categories--------------------------------------------------
        public function getCat(){
            $getCat = $this->db->prepare("SELECT * FROM categories");
            $getCat->execute();
            $result = $getCat->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($result);
            return $result;
        }
//-----------------------------------------display cat by id----------------------------------------------------
        public function getCatById($id){
            $getCat = $this->db->prepare("SELECT * FROM categories INNER JOIN produits ON categories.id = produits.id_categories WHERE categorie.id = :id");
            $getCat->bindValue(':id', $id, PDO::PARAM_STR);
            $getCat->execute();
            $result = $getCat->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
//-------------------------------------------Display Sub Categories--------------------------------------------------
        public function getSubCat(){
            $getSubCat = $this->db->prepare("SELECT * FROM sous_categories");
            $getSubCat->execute();
            $result = $getSubCat->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($result);
            return $result;
}
//-----------------------------------------display sub cat update ----------------------------------------------------------------
    public function updateSubCat(){
        $getCatName = $this->db->prepare("SELECT sous_categories.id, sous_categories.nom_sous_cat, id_categories, nom FROM sous_categories INNER JOIN categories ON sous_categories.id_categories = categories.id");
        $getCatName->execute();
        $result = $getCatName->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
//-----------------------------------------Update Cat  ----------------------------------------------------------------
    public function updateCat($id, $idCat, $idSubCat){
        $updateCat = $this->db->prepare("UPDATE produits SET id_categories=:id_categories, id_sous_categories=:id_sous_categories WHERE id = :id");
        $updateCat->bindValue(':id', $id, PDO::PARAM_INT);
        $updateCat->bindValue(':id_categories', $idCat, PDO::PARAM_INT);
        $updateCat->bindValue(':id_sous_categories', $idSubCat, PDO::PARAM_INT);
        $updateCat->execute();
    }
//------------------------------------------new Sub Categories------------------------------------------------------
        public function insertSubCat($nom, $idSubCat){
            $insertSubCat = $this->db->prepare("INSERT INTO sous_categories (nom_sous_cat, id_categories) VALUES (:nom, :id_categories)");
            $insertSubCat->bindParam(':nom',$nom, PDO::PARAM_STR);
            $insertSubCat->bindParam(':id_categories', $idSubCat, PDO::PARAM_STR);
            $insertSubCat->execute();
        }
//-------------------------------------------Display Sub Categories--------------------------------------------------
        // public function getSubCat(){
        //     $getSubCat = $this->db->prepare("SELECT * FROM sous_categories");
        //     $getSubCat->execute();
        //     $result = $getSubCat->fetch(PDO::FETCH_ASSOC);
        //     return $result;
        // }
//-------------------------------------------Count Cat---------------------------------------------------------------
        // public function countCategories(){
        //     $countCat = $this->db->prepare("SELECT COUNT `nom` FROM `categories`");
        //     $countCat->execute();
        //     $results = $countCat->fetch(PDO::FETCH_ASSOC);
        //     return $results;
        // }
//----------------------------------------Delete Categ------------------------------------------------------------------------------
        public function deleteCategories($id){
            $delete = $this->db->prepare("DELETE FROM categories WHERE id = :id");
            $delete->bindValue(':id', $id, PDO::PARAM_STR);
            $delete->execute();
        }
//---------------------------------------Delete Sub Categories--------------------------------------------------------------
        public function deleteSubCategories($id){
            $deleteSub = $this->db->prepare("DELETE FROM sous_categories WHERE id = :id");
            $deleteSub->bindValue(':id', $id, PDO::PARAM_STR);
            $deleteSub->execute();
        }
//----------------------------------------------Select add product------------------------------------------------------------------------------
        public function selectAddProduct($id){
            $select = $this->db->prepare("SELECT * FROM categories INNER JOIN sous_categories ON categories.id = sous_categories.id_categories WHERE categories.id = :id");
            $select->bindValue(':id', $id, PDO::PARAM_STR);
            $select->execute();
            $result = $select->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        // public function selectUpProduct($id){
        //     $select = $this->db->prepare("SELECT * FROM sous_categories INNER JOIN produits ON produits.id = sous_categories.id_categories WHERE sous_categories.id = :id");
        //     $select->bindValue(':id', $id, PDO::PARAM_STR);
        //     $select->execute();
        //     $result = $select->fetchAll(PDO::FETCH_ASSOC);
        //     return $result;
        // }
    }
    
?>