<?php
require_once 'vendor/autoload.php';

session_start();

use Bihin\Forteroche\classes\Router;

//require_once 'classes/Router.php';

$router = new Router();
$router->renderController();
