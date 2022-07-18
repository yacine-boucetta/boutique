<?php
require_once('model/Model.php');
require_once('model/Error.php');
require_once('controller/Controller.php');

spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);
    require("controller/$className.php");
});

$url = '';

if (isset($_GET['p'])) {
    $url = explode('/', $_GET['p']);
}

Controller::index($url);
