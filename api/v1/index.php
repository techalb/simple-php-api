<?php

$controller = isset($_GET['c']) ? $_GET['c'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';

if(!$controller || !$action){
    die('You must request a valid endpoint');
}

require '../../vendor/autoload.php';
require_once('../controllers/jsonplaceholder.php');
require_once('../controllers/github.php');

switch($controller){
    case 'home':
        $object = new stdClass();
        $object->controller = 'home';
        $object->action = $action;
        $object->allParams = $_GET;

        echo(json_encode($object));

    break;
    case 'jsonplaceholder':
        new JsonPlaceHolder($action);
    break;
    case 'github':
        new GitHub($action);
    break;
    default:
        echo 'Controller not found';
    break;
}
// echo 'controller: ' . $controller;
// echo '<br/>action: ' . $action;
die();