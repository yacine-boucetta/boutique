<?php

    require ('Model/Model.php' );

    class Categories extends Model{

        public $id;
        public $nom;

        function __construct(){
            parent::__construct($this->db);
        }
//------------------------------------------new Categories------------------------------------------------------
        public function insertCat($nom){
            $insertCat = $this->db->prepare("INSERT INTO categories (nom) VALUES (:nom)");
            $insertCat->bindParam(':nom',$nom, PDO::PARAM_STR);
            $insertCat->execute();
        }
//-------------------------------------------Display Categories--------------------------------------------------
        public function getCat(){
            $getCat = $this->db->prepare("SELECT * FROM categories");
            $getCat->execute();
            $result = $getCat->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        //------------------------------------------new Sub Categories------------------------------------------------------
        public function insertSubCat($nom){
            $insertSubCat = $this->db->prepare("INSERT INTO sous_categories (nom_sous_cat, id_categories) VALUES (:nom, :id_categories)");
            $insertSubCat->bindParam(':nom',$nom, PDO::PARAM_STR);
            $insertSubCat->bindParam(':id_categories',$nom, PDO::PARAM_STR);
            $insertSubCat->execute();
        }
//-------------------------------------------Display Sub Categories--------------------------------------------------
        public function getSubCat(){
            $getSubCat = $this->db->prepare("SELECT * FROM sous_categories");
            $getSubCat->execute();
            $result = $getSubCat->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    }
?>