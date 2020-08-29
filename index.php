<?php

session_start();

require_once 'classes/Router.php';
//require_once utils/MyAutoload.php;
//use Bihin\Forteroche\utils\MyAutoload;

//MyAutoload::start();

$router = new Router();
$router->renderController();
