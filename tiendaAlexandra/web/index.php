<?php

session_start();
if(!isset($_SESSION['grupo'])){
  $_SESSION['grupo']='visitante';
}

include __DIR__ . '/../config/autoload.php';

$router = new Amowhi\Cms\Core\Router();
$router->resolve();
