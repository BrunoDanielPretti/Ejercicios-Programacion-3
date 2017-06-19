<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'clases/AutentificadorJWT.php';

//\slim\Slim::registerAutoloader();
//$app = new \Slim\App();

$config['displayErrorDetails'] = false;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);



$app->get('/', function(){
    echo "hola world, por GET";
});

$app->post('/', function(){
    echo "hola world, por POST";
});

$app->get('/midle', 'miMidle1', 'miMidle2',function(){
    echo "<br>midle, por GET";
});

$app->get('/p', function(){
    echo "aca entro a p";
});

$app->get('/nexo/{id}', function($request, $response, $args){
    $p = $args['id'];
    echo "Nexo Hola!!! :D $p";
});

$app->post('/parametros', function(Request $request, Response $response){
    // $nombre = $request->getParam("nombre");
    // $numero = $request->getParam("numero");
    // echo "$nombre<br>$numero";
    echo "ASD";
});

//---------------------------------  TOKENS  --------------------------------------------------//

$app->get('/getNewToken', function(){
    $datos = array('juan' => 'rogelio','apellido' => 'peres', 'edad' => 33);    
    $token = AutentificadorJWT::CrearToken($datos);

    //var_dump($token);
    echo $token;
});

$app->get('/ValidarToken', function (Request $request, Response $response) {        
    //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJQVQiOjE0OTc1Nzk2OTcsIkVYUCI6MTQ5NzU3OTc1NywiREFUQSI6eyJqdWFuIjoicm9nZWxpbyIsImFwZWxsaWRvIjoicGVyZXMiLCJlZGFkIjozM30sIkFQUCI6ImFwaXJlc3QgSldUIn0.qZ4qjHJKHouScHhUDyt_uS7KX7aJSS2HszW2smM8nfY";
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJQVQiOjE0OTc3MzU3ODUsIkVYUCI6MTQ5NzczNTg0NSwiREFUQSI6eyJqdWFuIjoicm9nZWxpbyIsImFwZWxsaWRvIjoicGVyZXMiLCJlZGFkIjozM30sIkFQUCI6ImFwaXJlc3QgSldUIn0.VV9zLG3Gnxu3XemwXWyuHfL-Bt87ZeH0GNldcgTveFs";
    try{
        AutentificadorJWT::VirificarToken($token);
        return "valido";
    }
    catch(Exception  $e){
        return $e->getMessage();
    }
    
    
    //$newResponse = $response->withJson($decod, 200);     
    //return $newResponse;
    //AutentificadorJWT::VirificarToken($token);
    //var_dump($decod);
});

//----------------------------------------------------------------------------------------------//

function miMidle1(){
    echo "echo de miMidle 1";   
}
function miMidle2(){
    echo "echo de miMidle 2";
}
/*
$app->map('/map', function(){   //Funciona con los vervos q se le pasan por via()
    echo "hola GET y POST";
})->via(['GET', 'POST']);
*/
$app->run();
?>

