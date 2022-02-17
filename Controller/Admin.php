<?php

    require('Model/Product.php');

    class Admin{


//-------------------------------------------------Select all cat for display ---------------------------
        public function selectCategorie(){
            $selectCategorie = new Categories();
            $selectCat = $selectCategorie->getCat();
            $i = 0;
            while($fetchCat = $selectCat){
                $tab[$i][] = $fetchCat['id'];
                $tab[$i][] = $fetchCat['nom'];
                $i++;
            }
            return $tab;
        }
//----------------------------------------------------affichage Cat -------------------------------------
        public function diplayCat(){
            $choice = new Admin;
            $tab = $choice->selectCategorie();
            foreach($tab as $values){
                echo '<option value="' . $values[0] . '">' . $values[1] . '</option>';
            }
        }
//-------------------------------------------------ajout de categorie------------------------------------------------------------

        public function addCat(){
            if(isset($_POST['createCat'])){
                $create = new Categories;
                $create->insertCat(htmlspecialchars($_POST['catName']));
                echo 'coucou cat';
            }

        }

    }

?>