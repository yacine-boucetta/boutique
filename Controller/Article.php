<?php
require 'Model/Products.php';
class Article{
public static function viewArticle(){
    require('view/article.php');
}
public static function GetArticle(){

$produit=new Products;
$idArticle=$produit->getAllInfo($produit->id);

var_dump($idArticle);

}


}