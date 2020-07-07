<?php

$controller = isset($_GET['c']) ? $_GET['c'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';

if(!$controller || !$action){
    die('You must request a valid endpoint');
}

require '../../vendor/autoload.php';
require_once('../controllers/jsonplaceholder.php');

switch($controller){
    case 'home':
        echo 'home';
    break;
    case 'jsonplaceholder':
        new JsonPlaceHolder($action);
    break;
    default:
        echo 'Controller not found';
    break;
}
// echo 'controller: ' . $controller;
// echo '<br/>action: ' . $action;
die();