<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '/vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->get('[/]', function (Request $request, Response $response) {    
    //$response->getBody()->write("GET => Bienvenido!!! ,a SlimFramework");
    
    echo "ola q ase";
    //return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute("name");
    echo "hola $name";
});

$app->get('/Hola', function (Request $request, Response $response) {
    $name = $request->getParam("nombre");
    echo "hola2 $name";
});

$app->get('/asd/', function (Request $request, Response $response) {    
    //$response->getBody()->write("GET => Bienvenido!!! ,a SlimFramework");
    
    echo "ASD";
    //return $response;
});

$app->post('/asd/', function (Request $request, Response $response) {    
    //$response->getBody()->write("GET => Bienvenido!!! ,a SlimFramework");
    
    echo "Post ASD";
    //return $response;
});


$app->run();
?>