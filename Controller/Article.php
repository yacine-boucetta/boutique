<?php
require 'Model/Products.php';

class Article{
public static function viewArticle(){
    require('view/article.php');
}

public static function GetArticle($id){
    
$produit=new Products;
$idArticle=$produit->getAllInfo($id);

var_dump($idArticle);

}


}