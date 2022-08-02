<?php

    //require('Model/Products.php');
    require('Model/Categories.php');
    require('Model/User.php');

    class Admin{

        public static function adminView()
        {
            $resulta=Product::insertProduct();
            $results=Admin::addCat();
            $message=Admin::addSubCat();
            $resultas=Product::updateProduct();
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
            $choice = new Categories();
            $tab = $choice->getCat();
            foreach($tab as $values){
                echo '<option value="' . $values['id'] . '">' . $values['nom'] . '</option>';
                
            }
        }
//---------------------------------------------------- affichage Cat -------------------------------------
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
//------------------------------------------Affichage cat name-------------------------------------------------------------------------
public static function displayNameCat(){
    $choice = new Categories();
    $tab = $choice->updateSubCat();
    echo 'coucou78';
    foreach($tab as $values){
        echo '<option value="' . $values['id'] . '">' . $values['nom'] .' / '. $values['nom_sous_cat']. '</option>';
    }
    echo '<pre>';
    var_dump($tab);
    echo '</pre>';
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
                $count = new Categories;
                $compter = $count->countCat($_POST['catName']);
                var_dump($compter);
                if($compter > 0){
                    $results = "Ce nom de categories existe deja.";
                    echo $results;
                    return $results;
                }else{
                $create = new Categories;
                $create->insertCat(htmlspecialchars($_POST['catName']));
                }
            }
        }
//-------------------------------------------------ajouts sub cat ------------------------------------------------------------------
        public static function addSubCat(){
            if(isset($_POST['createSubCat'])){
                $count = new Categories;
                $compter = $count->countSubCat($_POST['catSubName']);
                var_dump($compter);
                if($compter > 0){
                    $message = 'Ce nom de sous categories existe deja';
                    //echo $message;
                    return $message;
                }else{
                $create = new Categories;
                $create->insertSubCat(htmlspecialchars($_POST['catSubName']), htmlspecialchars($_POST['idCatForSub']));
                //header ('Location:./Admin');
            }
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
//----------------------------------------------------select cat pour ajout ------------------------------------------------------------------------------------
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
//----------------------------------------------------selectCat pour modif -----------------------------------------------------------------------------------
    public static function updateSelect(){
        if(isset($_POST['upCateg'])){
            $select = new Categories;
            $tab = $select->selectAddProduct(htmlspecialchars($_POST['upSelect']));
            foreach($tab as $values){
                echo '<option value="' . $values['id'] . '">' . $values['nom_sous_cat'] . '</option>';
                
        }
    }
}
//----------------------------------------------------select prod pour ajouts-------------
    public static function prodSelect(){
        $select = new Model;
        $tab = $select->getProd();
        foreach($tab as $values){
            echo '<option value="' . $values['id'] . '">' . $values['nom'] . '</option>';
        }
    }
//---------------------------------------------User Select-----------------------------------------------------------------------
    public static function displayUser(){
        //$choice = new Admin;
        $choice = new User();
        $tab = $choice->getUser();
        //$tab = $choice->selectCategorie();
        // echo '<pre>';
        // var_dump($tab);
        // echo '</pre>';
        //var_dump($tab);
        foreach($tab as $values){
            echo '<option value="' . $values['id'] . '">' . $values['login'] . '</option>';

            //return $result;
            
        }
    }
//------------------------------delete user----------------------------------------------------------------
public static function deleteUser(){
    if(isset($_POST['deleteUser'])){
        $delete = new User;
        $delete->userDelete($_POST['idDelete']);
        header ('Location:./Admin');
    }
    else{
        echo "Vous n'avez pas les droits pour supprimer un Administrateur";
    }
}

//----------------------------------------------------------------update right --------------------------------------------------------------

public static function modUser(){
    if(isset($_POST['modUser'])){
        $mod = new User;
        $mod->updateRight($_POST['idRight'], $_POST['idUserRight']);
        //header ('Location:./Admin');
    }
}

//---------------------------------------------------Display ajouts de product -----------------------------------------------------------
    // public function addForm(){
    //     if(isset($_POST['addSelect'])){
    //         echo 
    //         "<input type='text' name='nom'></input>
    //         <textarea name='description'></textarea>
    //         <select name='idSousCat'> 
    //         ";

    //             $option = new Admin;
    //             $option->addSelect(htmlspecialchars($_POST['addSelect']));

    //         echo "</select>
    //         <input type='text' name='prix'></input>
    //         <input type='file' name='image'></input>
    //         <input type='submit' name='addProd'></input>
    //         ";
    //     }
    // }
//------------------------------------------------Display update de produits --------------------------------------------------------
    // public function addUpForm(){
    //     if(isset($_POST['upSelect'])){
    //         var_dump($_POST['upSelect']);
    //         echo
    //         "<select name='upCateg'>";
    //         $option = new Admin;
    //         $option->displayCat();
    //         echo"</select>";
    //         echo
    //             "<select name='upIdSousCat'>"; 
    //                 //$option = new Admin;
    //                 $option->updateSelect($_POST['upSelect']);
    //             "</select>";
    //             echo        
    //             "<input type='text' name='upNom'></input>
    //             <textarea name='upDescription'></textarea>
    //             <input type='text' name='upPrix'></input>
    //             <input type='file' name='upImage'></input>
    //             <input type='submit' name='updateProd'></input>
    //             ";
                
    //         }
    //     }

        }
    

//}

?>