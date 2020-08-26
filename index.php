<?php

session_start();

require_once 'utils/MyAutoload.php';

/*
use Bihin\Forteroche\utils\MyAutoload;
use Bihin\Forteroche\classes\Router;
*/

MyAutoload::start();

$router = new Router();
$router->renderController();
