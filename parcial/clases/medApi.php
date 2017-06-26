<?php
require "/medicamento.php";

class MedApi extends Medicamento{
    public function Hola(){
        return "Hola MedApi!!";
    }

    public function CargarUno($request, $response, $args){
        $Parametros = $request->getParsedBody();

        $miMed = new Medicamento($Parametros['nombre'], $Parametros['precio'], $Parametros['laboratorio']);
    
        $mensaje = "se a insertado en el ID: ";
        $mensaje .= $miMed->InsertarMedicamento();
        $mensaje .= " El Medicamento: $miMed->nombre, Precio: $miMed->precio, Laboratorio: $miMed->laboratorio";

        $newResponse = $response->withJson($mensaje, 200);
        return $newResponse;
    }

    public function TraerTodos($request, $response, $args) {
      	$Medicamentos=Medicamento::TraerTodosLosMed();
     	$response = $response->withJson($Medicamentos, 200);  
    	return $response;
    }

    public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$miMed=Medicamento::TraerUnMedicamento($id);
        if($miMed != false){
            $newResponse = $response->withJson($miMed, 200);          
		    return $newResponse;
        }else{
            return "El Medicamento $id no esta!!!";
        }
     	
    }

    public function BorrarUno($request, $response, $args) {	
		$id=$args['id'];     	
     	$respuesta=Medicamento::BorrarMedicamento($id);
     	
	    if($respuesta->cantidad > 0)
	    	{
	    		 $objDelaRespuesta="Borro el medicamento: ".$respuesta->pelota->id." ".$respuesta->pelota->nombre;
	    	}
	    	else
	    	{
	    		$objDelaRespuesta="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;		
    }






}




?>