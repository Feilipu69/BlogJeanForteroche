<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

session_start();

use Bihin\Forteroche\classes\Router;

$router = new Router();
$router->renderController();
