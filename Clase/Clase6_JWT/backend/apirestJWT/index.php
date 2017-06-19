<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '/vendor/autoload.php';
require_once '/clases/AutentificadorJWT.php';

$config['displayErrorDetails'] = false;
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

$app->get('/CrearToken', function (Request $request, Response $response) {
    $datos = array('juan' => 'rogelio','apellido' => 'peres', 'edad' => 33);    
    $token = AutentificadorJWT::CrearToken($datos);

    var_dump($token);
});

$app->get('/ValidarToken', function (Request $request, Response $response) {        
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJQVQiOjE0OTc1Nzk2OTcsIkVYUCI6MTQ5NzU3OTc1NywiREFUQSI6eyJqdWFuIjoicm9nZWxpbyIsImFwZWxsaWRvIjoicGVyZXMiLCJlZGFkIjozM30sIkFQUCI6ImFwaXJlc3QgSldUIn0.qZ4qjHJKHouScHhUDyt_uS7KX7aJSS2HszW2smM8nfY";
    try{
        AutentificadorJWT::VirificarToken($token);
        return "valido";
    }
    catch(exeption $e){
        return "error";
    };
    
    //$newResponse = $response->withJson($decod, 200);     
    //return $newResponse;
    //AutentificadorJWT::VirificarToken($token);
    //var_dump($decod);
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