<?php
require_once 'vendor/autoload.php';

session_start();

use Bihin\Forteroche\classes\Router;

$router = new Router();
$router->renderController();
