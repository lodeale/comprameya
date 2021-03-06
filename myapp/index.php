<?php
/*
* Index.php
*/
require 'vendor/autoload.php';

use \Slim\Slim;
use myapp\Classes\DB\DB as DB;

$app = new Slim();
$db = new DB();

require_once 'routers/routerProductos.php';
require_once 'routers/routerCategorias.php';
require_once 'routers/routerPersonas.php';

$app->get('/',function(){
    echo "Home Application";
});

$app->response->headers->set('Content-Type','application/json');
$app->run();






