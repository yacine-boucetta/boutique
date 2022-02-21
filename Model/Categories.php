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
            return $result;
        }
        //------------------------------------------new Sub Categories------------------------------------------------------
        public function insertSubCat($nom, $idSubCat){
            $insertSubCat = $this->db->prepare("INSERT INTO sous_categories (nom_sous_cat, id_categories) VALUES (:nom, :id_categories)");
            $insertSubCat->bindParam(':nom',$nom, PDO::PARAM_STR);
            $insertSubCat->bindParam(':id_categories', $idSubCat, PDO::PARAM_STR);
            $insertSubCat->execute();
        }
//-------------------------------------------Display Sub Categories--------------------------------------------------
        public function getSubCat(){
            $getSubCat = $this->db->prepare("SELECT * FROM sous_categories");
            $getSubCat->execute();
            $result = $getSubCat->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
//-------------------------------------------Count Cat---------------------------------------------------------------
        public function countCategories(){
            $countCat = $this->db->prepare("SELECT COUNT `nom` FROM `categories`");
            $countCat->execute();
            $results = $countCat->fetch(PDO::FETCH_ASSOC);
            return $results;
        }
//----------------------------------------Delete Categ------------------------------------------------------------------------------
        public function deleteCategories($id){
            $delete = $this->db->prepare("DELETE FROM categories WHERE id = :id");
            $delete->bindValue(':id', $id, PDO::PARAM_STR);
            $delete->execute();
        }
//---------------------------------------Delete Sub Categories--------------------------------------------------------------
        public function deleteSubCategories($id){
            $deleteSub = $this->db->prepare("DELETE FROM categories WHERE id = :id");
            $deleteSub->bindValue(':id', $id, PDO::PARAM_STR);
            $deleteSub->execute();
        }
    }
?>