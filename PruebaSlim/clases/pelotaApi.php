<?php
    require_once "pelota.php";

    class PelotaApi extends Pelota{
        public function MostrarEnApi($request, $response, $args){
            return "aca esta en el API, PelotaApi";
        }


        public function Verificar($request, $response, $next){
            $flag = true;
            
            if($flag == true){
                $response = $next($request, $response);
                return $response;
            }else{
                $newResponse = $response->withJson("No Verificado", 200);    
                return $newResponse;
            }            
        }
    }






?>