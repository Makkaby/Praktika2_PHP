<?php
require '../vendor/autoload.php'
$app = new \Slim\App();

//example

$app->get('/', function($request, $response, $args){
    $response->write('Welcome to Slim')
})
""
$app->get('/countries', function($request, $response, $args) use ($countries){
    return $response->withJson($countries)
})

//example
?>