<?php

require ('Model/Products.php');

class Product{
    public static function productView(){
        $message='';
        require('view/Product.php');
    }
//-------------------------------------------------Verrif si les post sont vides --------------------------------------
    public static function checkPost(){
        if(empty($_POST['nom']) && empty($_POST['description']) && empty($_POST['idSousCat']) && empty($_POST['idCat']) && empty($_POST['prix']) && empty($_POST['img'])){
            $message = 'Veuillez remplir tout les champs';
            return $message;
        }
    }
//-------------------------------------------------Verrif du prix-------------------------------------------
    public static function priceProd(){

        if($_POST['upPrix'] <= 0){
            $message = 'Veuillez ajouter un prix positif';
            return $message;
        }

    }
//-------------------------------------------------Verrif de la longeuer des input -----------------------------------------
    public static function checkLenght(){
        $nameLenght = strlen($_POST['nom']);
        $desLenght = strlen($_POST['desription']);
        if($nameLenght <=1){
            $message = 'Le nom du produits doit faire plus que 1 cheracter';
            return $message;
        }elseif( $desLenght <=1 || $desLenght >= 200){
            $message = 'La description dot faire entre 1 et 200 characters';
            return $message;
        }
        
    }
//------------------------------------------------Check si le nom de produit existe deja ----------------------------------------------------------------
    public static function checkCount($nom){
        $count = new Products();
        $compter = $count->countProd($nom);
        if(isset($_POST['addSelect'])){
            if($compter > 0){
                $message = 'Ce nom de produits existe deja';
                return $message;
            
            }
        }
    }
//---------------------------------------------Ajouts des produits -------------------------------------------------------------
    // public static function insertProduct(){
        
        
    //     if(isset($_POST['addProd'])){
    //         //$idCat = $_POST['addSlect'];
    //         $count = new Products();
    //         $insert = new Product();
    //         if($count->countProd($_POST['nom']) > 1){
    //             $message = doublonError();
    //             return $message;
    //         }
    //         $insert->checkPost();
    //         $insert->priceProd();
    //         //$insert->checkCount();
    //         $image = $insert->addImg();
    //         $insert = new Products();
    //         $insert->insertProd(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['description']),htmlspecialchars($_POST['idSousCat']),htmlspecialchars($_POST['addSelect']),htmlspecialchars($_POST['prix']), $image);
    //         echo 'coucouLLOLOL';
    //     }

    // }
    public static function insertProduct(){


        if(isset($_POST['addProd'])){
            //$idCat = $_POST['addSlect'];
            $insert = new Products();
            $a = $insert->countProd($_POST['nom']);
            if($a > 0){
                $message = 'Ce nom de produits existe deja';
                return $message;
            }else{
            $insert = new Product();
            $insert->checkPost();
            $insert->priceProd();
            $image = $insert->addImg();
            $insert = new Products();
            $insert->insertProd(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['description']),htmlspecialchars($_POST['idSousCat']),htmlspecialchars($_POST['addSelect']),htmlspecialchars($_POST['prix']), $image);
            echo 'coucou';
            var_dump($a);
        }
        }

    }
//-----------------------------------------------------Old info for update------------------------------------------------------------

    public static function oldInfo(){

        if(isset($_POST['upSelect'])){
            $getInfo = new Products();
            $info = $getInfo->getAllInfos($_POST['upSelect']);
            echo'<pre>';
            var_dump($info);
            echo '</pre>';
            if(empty($_POST['nom'])){
                $_POST['nom'] = $info[0]['nom'];
            }if(empty($_POST['upDescription'])){
                $_POST['upDescription'] = $info[0]['description'];
            }if(empty($_POST['upIdSousCat'])){
                $_POST['upIdSousCat'] = $info[0]['id_sous_categories'];
            }if(empty($_POST['idCateg'])){
                $_POST['idCateg'] = $info[0]['id_categories'];
            }if(empty($_POST['upPrix'])){
                $_POST['upPrix'] = $info[0]['prix'];
            }//elseif(empty($_POST['image'])){
            //     $_POST['image'] = $info[0]['image'];
            // }
        }
        echo'<pre>';
        var_dump($_POST);
        echo '</pre>';
    }
//-------------------------------------------------Update Categ ----------------------------------------------------------------
    public static function updateCategorie(){
        if(isset($_POST['updateCat'])){
            $update = new Categories;
            $update->updateCat(htmlspecialchars($_POST['upCategoProd']),
            htmlspecialchars($_POST['idCategoUp']), htmlspecialchars($_POST['idSubCategoUp']));
            // echo'<pre>';
            // var_dump($_POST);
            // echo '</pre>';
        }
        
    }
//----------------------------------------------------
//     public static function displayUpdate(){
//         if(isset($_POST['choiceProd'])){
            
//             $getInfo = new Products();
//             $info = $getInfo->getAllInfos($_POST['upSelect']);
//             echo "</select>
//             <input type='text' name='nom' value='".$info[0]['nom']."'></input>
//             <textarea name='upDescription'>".$info[0]['description']."</textarea>
//             <select name='upIdSousCat'>
//             <option value='' disabled selected>Select your option</option>";
//             $option = new Admin;
//             $option->displaySubCat();

//             echo" </select>
//             <select name='idCateg'>
//             <option value='' disabled selected>Select your option</option>";

//             $option->displayCat();

//             echo"</select>                
//             <input type='text' name='upPrix' value='".$info[0]['prix']."'></input>
//             <input type='file' name='image' ".$info[0]['prix']."></input>
//             <input type='submit' name='updateProd'></input>";
            
//                 echo'<pre>';
//                 var_dump($info);
//                 var_dump($_POST);
//                 var_dump($_POST['image']);
//                 echo '</pre>';
//     }
// }
//-----------------------------------------------------Update Produits----------------------------------------------------------------

    public static function updateProduct(){
        if(isset($_POST['updateProd'])){
            //echo'coucou22';
            $count = new Products();
            $countLog = $count->countProd($_POST['nom']);
            if($countLog > 0){
                $message = 'Ce nom de produits existe deja';
                return $message;
            }else{
            $insert = new Product();
            $insert->oldInfo();
            $insert->checkPost();
            $insert->priceProd();
            //$image = $insert->addImg();
            $insert = new Products();
            $insert->updateProd(htmlspecialchars($_POST['upSelect']), htmlspecialchars($_POST['idCateg']),
            htmlspecialchars($_POST['upIdSousCat']),htmlspecialchars($_POST['nom']), 
            htmlspecialchars($_POST['upDescription']),
            htmlspecialchars($_POST['upPrix']));
        }

    }
}
//-----------------------------------------------------Supression des produits--------------------------------------------------
    public static function deleteProducts(){
        $delete = new Products();
        if(isset($_POST['deleteProd']))

        
        $delete->deleteProd($_POST['idDel']);
        //echo 'coucou2';
    }
//----------------------------------------------------ajouts d'img----------------------------------------------------
public static function addImg(){

    if (isset($_FILES['image']) ){
        var_dump($_FILES['image']);
        $fileName = $_FILES['image']['tmp_name']; // On récupère le nom du fichier
            $tailleMax = 5242880; // Taille maximum 5 Mo
        
            $extensionsValides = array('jpg','jpeg','png','JPG'); // Format accepté
            if ($_FILES['image']['size'] <= $tailleMax){ // Si le fichier et bien de taille inférieur ou égal à 5 Mo
                
                $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1)); // Prend l'extension après le point, soit "jpg, jpeg ou png"

                if (in_array($extensionUpload, $extensionsValides)){ // Vérifie que l'extension est correct
                    
                    $dossier = "./assets/images/"; // On se place dans le dossier de la personne 
                    if (!is_dir($dossier)){ // Si le nom de dossier n'existe pas alors on le crée

                        mkdir($dossier,0777,true);
                

                    }
                    $nom = $_POST['nom'] ; // Permet de générer un nom unique à la photo
                    $chemin = "./assets/images/" . $nom. "." . $extensionUpload; // Chemin pour placer la photo
                    $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin); // On fini par mettre la photo dans le dossier
                    if ($resultat){ // Si on a le résultat alors on va comprésser l'image
                            
                        $verif_ext = getimagesize("./assets/images/" . $nom. "." . $extensionUpload);
                        // Vérification des extensions avec la liste des extensions autorisés          
                        // J'enregistre le chemin de l'image dans filename
                        $fileName = "./assets/images/" . $nom. "." . $extensionUpload;
                                
                        return $fileName;    
                    }
                } 
            }
                    
    }

}
public static function showProduct(){
    $affiche=new Model;
    $prod=$affiche->getProd();
    return $prod;    
}



}

//require('view/admin.php');



?>