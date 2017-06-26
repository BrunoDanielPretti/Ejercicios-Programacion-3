<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/vendor/autoload.php';
require '/clases/AutentificadorJWT.php';
require '/clases/medApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

$app->get('/', function (Request $request, Response $response) {
  
    $response->getBody()->write("Hola Slim 2");

    return $response;
});

$app->group("/med", function(){
    //$this->get('/', \MedApi::class . ':Hola');
    $this->get('/', \MedApi::class . ':TraerTodos');    
    $this->post('/', \MedApi::class . ':CargarUno');
    $this->get('/{id}', \MedApi::class . ':traerUno');
    $this->delete('/{id}', \MedApi::class . ':BorrarUno');

})->add(\AutentificadorJWT::class . ':Verificar');

$app->post("/sesion",\AutentificadorJWT::class . ':BuscarUsuario');
$app->get('/sesion', \AutentificadorJWT::class . ':VerToken');

$app->run();

?>