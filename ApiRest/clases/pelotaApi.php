<?php
require_once("pelota.php");
class PelotaApi extends Pelota{

    public function CargarUno($request, $response, $args){
        $Parametros = $request->getParsedBody();

        $miPelota = new Pelota();
        $miPelota->nombre = $Parametros['nombre'];
        $miPelota->color  = $Parametros['color'];

        $mensaje = "se a insertado en el ID: ";
        $mensaje .= $miPelota->InsertarPelota();
        $mensaje .= " La pelota: $miPelota->nombre, color: $miPelota->color";

        $newResponse = $response->withJson($mensaje, 200);
        return $newResponse;
    }

    public function TraerTodos($request, $response, $args) {
      	$Pelotas=Pelota::TraerTodasLasPelotas();
     	$response = $response->withJson($Pelotas, 200);  
    	return $response;
    }

    public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$laPelota=Pelota::TraerUnaPelota($id);
        if($laPelota != false){
            $newResponse = $response->withJson($laPelota, 200);          
		    return $newResponse;
        }else{
            return "la pelota $id no esta!!!";
        }
     	
    }

    public function BorrarUno($request, $response, $args) {	
		$id=$args['id'];     	
     	$respuesta=Pelota::BorrarPelota($id);
     	
	    if($respuesta->cantidad > 0)
	    	{
	    		 $objDelaRespuesta="Borro la pelota: ".$respuesta->pelota->id." ".$respuesta->pelota->nombre;
	    	}
	    	else
	    	{
	    		$objDelaRespuesta="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;		
    }

    public function ModificarUnoPost($request, $response, $args) {     	
     	$Parametros = $request->getParsedBody();
       
        //_METHOD PUT
        $miPelota = new Pelota();
        $miPelota->nombre = $Parametros['nombre'];
        $miPelota->color  = $Parametros['color']; 
        $miPelota->id     = $Parametros['id'];

        $objDelaRespuesta = $miPelota->ModificarPelota();        
		return $response->withJson($objDelaRespuesta, 200);		
    }

    public function ModificarUno($request, $response, $args) {     	
     	$Parametros = $request->getHeaders();                
        //var_dump($Parametros);        

        $miPelota = new Pelota();
        $miPelota->nombre = $Parametros['HTTP_NOMBRE'][0]; //$Parametros['nombre'];
        $miPelota->color  = $Parametros['HTTP_COLOR'][0];
        $miPelota->id     = $Parametros['HTTP_ID'][0]; //$Parametros['id'];

        $objDelaRespuesta = $miPelota->ModificarPelota();        
		return $response->withJson($objDelaRespuesta, 200);		
    }

    public function SubirArchivo($request, $response, $args){        
        $archivos = $request->getUploadedFiles();
        $destino="./archivos/";        

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$nombreAnterior.".".$extension[0]);
        $response->getBody()->write("se guardo el archivo");

        return $response;
    }

}//Fin Class PelotaApi



?>