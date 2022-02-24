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
//------------------------------------------------Check si le nom de produit existe deja ----------------------------------------------------------------
    public static function checkCount(){
        $count = new Products();
        if(isset($_POST['addSelect'])){
            if($count->countProd($_POST['nom']) > 0){
                $message = 'Ce nom de produits existe deja';
                return $message;
            
            }
        }
    }
//---------------------------------------------Ajouts des produits -------------------------------------------------------------
    public static function insertProduct(){
        
        
        if(isset($_POST['addProd'])){
            //$idCat = $_POST['addSlect'];
            $insert = new Product();
            $insert->checkPost();
            $insert->priceProd();
            $insert->checkCount();
            $image = $insert->addImg();
            $insert = new Products();
            $insert->insertProd(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['description']),htmlspecialchars($_POST['idSousCat']),htmlspecialchars($_POST['addSelect']),htmlspecialchars($_POST['prix']), $image);
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
            
            
        if(isset($_POST['updateProd'])){
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

}public static function showProduct(){
    $affiche=new Model;
    $prod=$affiche->getProd();
    foreach ($prod as $product ) { ?>
   
    <div class="card">
        <h2><?=$product['nom']?></h2>
        <img src="<?=$product['image']?>" alt="">
        <p><?=$product['description']?></p>
        <p><?= $product['prix'] ?>€</p>
    </div>
      <?php  
    }
}

}
//require('view/admin.php');



?>