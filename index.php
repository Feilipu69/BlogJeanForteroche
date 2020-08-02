<?php
require_once 'utils/MyAutoload.php';

MyAutoload::start();

$get = $_GET['get'];

$router = new Router($get);
$router->renderController();
