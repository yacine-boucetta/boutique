<?php

    //require('Model/Products.php');
    require('Model/Categories.php');

    class Admin{

        public static function adminView()
        {
            $message = '';
            require('view/Admin.php');

        }

//-------------------------------------------------Select all cat for display ---------------------------
        // public static function selectCategorie(){
        //     $selectCategorie = new Categories();
        //     $selectCat = $selectCategorie->getCat();
        //     $i = 0;
        //     echo '<pre>';
        //     var_dump($selectCat);
        //     echo '</pre>';
        //     while($fetchCat = $selectCat){

        //         $tab[$i][] = $fetchCat[$i]['id'];
        //         $tab[$i][] = $fetchCat[$i]['nom'];
        //         $i++;

        //         return $tab;
                
        //         var_dump($tab);
        //     }
            
        // }
//----------------------------------------------------affichage Cat -------------------------------------
        public static function displayCat(){
            //$choice = new Admin;
            $choice = new Categories();
            $tab = $choice->getCat();
            //$tab = $choice->selectCategorie();
            // echo '<pre>';
            // var_dump($tab);
            // echo '</pre>';
            //var_dump($tab);
            foreach($tab as $values){
                echo '<option value="' . $values['id'] . '">' . $values['nom'] . '</option>';

                //return $result;
                
            }
        }
//----------------------------------------------------affichage Cat -------------------------------------
        public static function displaySubCat(){
            //$choice = new Admin;
            $choice = new Categories();
            $tab = $choice->getSubCat();
            //$tab = $choice->selectCategorie();
            // echo '<pre>';
            // var_dump($tab);
            // echo '</pre>';
            foreach($tab as $values){
                echo '<option value="' . $values['id'] . '">' . $values['nom_sous_cat'] . '</option>';
                
                //return $result;
                
            }
        }
//----------------------------------------------------affichage Sub Cat --------------------------------
    public static function displaySubCatProd(){
        //$choice = new Admin;
        $choice = new Categories();
        $tab = $choice->getSubCat();
        //$tab = $choice->selectCategorie();
        // echo '<pre>';
        // var_dump($tab);
        // echo '</pre>';
        foreach($tab as $values){
            echo '<option value="' . $values['id_categories'] . '">' . $values['nom_sous_cat'] . '</option>';
            
            //return $result;
            
        }
    }
//-------------------------------------------------ajout de categorie------------------------------------------------------------

        public static function addCat(){
            if(isset($_POST['createCat'])){
                $create = new Categories;
                $create->insertCat(htmlspecialchars($_POST['catName']));
                //echo 'coucou cat';
            }
//-------------------------------------------------ajouts sub cat ------------------------------------------------------------------
        }
        public static function addSubCat(){
            if(isset($_POST['createSubCat'])){
                $create = new Categories;
                $create->insertSubCat(htmlspecialchars($_POST['catSubName']), htmlspecialchars($_POST['idCatForSub']));
                header ('Location:./Admin');
            }

        }
//------------------------------------------------Suppresion Cat------------------------------------------------------------------------------------------------

        public static function deleteCateg(){
            if(isset($_POST['deleteCat'])){
                $delete = new Categories;
                $delete->deleteCategories(htmlspecialchars($_POST['idDel']));
                header ('Location:./Admin');
            }
        } 
//------------------------------------------------Suppresion Cat------------------------------------------------------------------------------------------------

    public static function deleteSubCateg(){
        if(isset($_POST['deleteSubCateg'])){
            $delete = new Categories;
            $delete->deleteSubCategories(htmlspecialchars($_POST['idSubDel']));
            header ('Location:./Admin');
        }
}
//----------------------------------------------------select pour ajout ------------------------------------------------------------------------------------
    public static function addSelect(){
        if(isset($_POST['addSelect'])){
            $select = new Categories;
            $tab = $select->selectAddProduct(htmlspecialchars($_POST['addSelect']));
            foreach($tab as $values){
                echo '<option value="' . $values['id'] . '">' . $values['nom_sous_cat'] . '</option>';
                //return $result;
            }
        }
    }
//---------------------------------------------------Display ajouts de product -----------------------------------------------------------
    public function addForm(){
        if(isset($_POST['addSelect'])){
            echo 
            "<form>
            <input type='text' name='nom'></input>
            <input type='textarea' name='description'></input>
            <select name='idSousCat'> 
            ";
                $option = new Admin;
                $option->addSelect(htmlspecialchars($_POST['addaddSelect']));
            echo "</select>
            <input type='text' name='prix'></input>
            <input type='text' name='img'></input>
            <input type='submit' name='addProd'></input>
        </form>
            ";
        }
    }
    }

?>