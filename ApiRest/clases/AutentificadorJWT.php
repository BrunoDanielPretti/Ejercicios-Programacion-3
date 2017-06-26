<?php
    require_once "vendor/autoload.php";
    use Firebase\JWT\JWT;

    class AutentificadorJWT{
        private static $claveSecreta = "acaVaUnaClaveSecreta";
        private static $tipoEncriptacion = 'HS256';

        public static function CrearToken($datos){
            $ahora = time();
            $playLoad = array(              //el Token
                'IAT' => $ahora,
                'EXP' => $ahora + 20,
                'DATA' => $datos,
                'APP' => "apirest JWT"
            );

            return JWT::encode($playLoad, self::$claveSecreta);
        }

        public static function VirificarToken($pToken){
            try{
                $decod = JWT::decode($pToken, self::$claveSecreta, array(self::$tipoEncriptacion) );
            }
            catch(\exeption $e){
                throw new exception("Error de procesamiento", 404);
            }
            
            if ($decod->EXP < time() ) {
                throw new exception('Expiro');
            }                        
        }

        public static function GenerarToken(){
            $datos = array('juan' => 'rogelio','apellido' => 'peres', 'edad' => 33);
            $token = AutentificadorJWT::CrearToken($datos);
            setcookie("token", $token, time()+30, "/"); 
            return "Token Creado";
        }

         public static function VerToken(){
            $pToken = $_COOKIE["token"];
            $decod = JWT::decode($pToken, self::$claveSecreta, array(self::$tipoEncriptacion) );
            var_dump($decod);
        }

        public function Verificar($request, $response, $next){
            $verificar = false;
            
            if($verificar == false || !empty($_COOKIE["token"]) ){
                $response = $next($request, $response);    
                return $response;
            }else{
                $newResponse = $response->withJson("Token no Valido", 200);    
                return $newResponse;
            }            
        }
    }//FIN Class


?>