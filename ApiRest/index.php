<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/vendor/autoload.php';
require '/clases/AccesoDatos.php';
require '/clases/cd.php';
require '/clases/cdApi.php';
require '/clases/PelotaApi.php';
require '/clases/AutentificadorJWT.php';

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

$app->get('/p', function(){
    echo "aca entro a p";
});

$app->group('/cd', function () {
 
  $this->get('/', \cdApi::class . ':traerTodos');
 
  $this->get('/{id}', \cdApi::class . ':traerUno');

  $this->post('/', \cdApi::class . ':CargarUno');

  $this->delete('/{id}', \cdApi::class . ':BorrarUno');

  $this->put('/', \cdApi::class . ':ModificarUno');
  
});

$app->group('/pelota', function () {
 
  $this->get('/', \PelotaApi::class . ':traerTodos');
 
  $this->get('/{id}', \PelotaApi::class . ':traerUno');

  $this->post('/', \PelotaApi::class . ':CargarUno');

  $this->delete('/{id}', \PelotaApi::class . ':BorrarUno');

  $this->put('/', \PelotaApi::class . ':ModificarUno');
  
})->add(\AutentificadorJWT::class . ':Verificar');

$app->group('/t', function(){
    $this->post('/', \AutentificadorJWT::class . ':GenerarToken');
    $this->get('/', \AutentificadorJWT::class . ':VerToken');
});



$app->run();

?>