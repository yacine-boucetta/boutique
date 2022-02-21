<?php

require ('Model/Products.php');

class Product{
//-------------------------------------------------Verrif si les post sont vides --------------------------------------
    public static function checkPost(){
        if(empty($_POST['nom']) && empty($_POST['description']) && empty($_POST['idSousCat']) && empty($_POST['idCat']) && empty($_POST['prix']) && empty($_POST['img'])){
            $message = 'Veuillez remplir tout les champs';
            return $message;
        }
    }
//-------------------------------------------------Verrif du prix-------------------------------------------
    public static function priceProd(){

        if($_POST['prix'] <= 0){
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
        }
        
    }

//---------------------------------------------Ajouts des produits -------------------------------------------------------------
    public static function insertProduct(){
        
        
        if(isset($_POST['addProd'])){
            $insert = new Product();
            $insert->checkPost();
            $insert->priceProd();
            $insert = new Products();
            $insert->insertProd(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['description']),htmlspecialchars($_POST['idSousCat']),htmlspecialchars($_POST['idCat']),htmlspecialchars($_POST['prix']), htmlspecialchars($_POST['img']));
            echo 'coucou';
        }

    }
//-----------------------------------------------------Old info for update------------------------------------------------------------

    public static function oldInfo(){

        if(isset($_POST['updateProd'])){
            $getInfo = new Products();
            $getInfo->getAllInfos($_POST['prodChoice']);
            if(empty($_POST['upNom'])){
                $_POST['upNom'] = $getInfo['nom'];
            }elseif(empty($_POST['upDes'])){
                $_POST['upDes'] = $getInfo['description'];
            }elseif(empty($_POST['upSousCat'])){
                $_POST['upSousCat'] = $getInfo['id_sous_categories'];
            }elseif(empty($_POST['upCat'])){
                $_POST['upCat'] = $getInfo['id_categories'];
            }elseif(empty($_POST['upPrix'])){
                $_POST['upPrix'] = $getInfo['prix'];
            }elseif(empty($_POST['upImg'])){
                $_POST['ipImg'] = $getInfo['id_sous_categories'];
            }
        }
    }

//-----------------------------------------------------Update Produits----------------------------------------------------------------

    public static function updateProduct(){
            
            
        if(isset($_POST['addProd'])){
            $insert = new Product();
            $insert->oldInfo();
            $insert->checkPost();
            $insert->priceProd();
            $insert = new Products();
            $insert->insertProd(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['description']),htmlspecialchars($_POST['idSousCat']),htmlspecialchars($_POST['idCat']),htmlspecialchars($_POST['prix']), htmlspecialchars($_POST['img']));
            echo 'coucou';
        }

    }

//-----------------------------------------------------Supression des produits--------------------------------------------------
    public static function deleteProducts(){
        $delete = new Products();
        if(isset($_POST['deleteProd']))

        
        $delete->deleteProd($_POST['idDel']);
        echo 'coucou2';
    }

}
//require('view/admin.php');



?>