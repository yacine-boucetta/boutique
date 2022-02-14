<?php
require_once ('Controller/Controller');
require_once ('Model/Model.php');

$params=explode('/',$_GET['p']);
if($params[0] != ""){
    $controller = ucfirst($params[0]);
    $action = isset($params[1]) ? $params[1] : 'index';
    require_once ('Controller/'.$controller.'');
}else{
    
}