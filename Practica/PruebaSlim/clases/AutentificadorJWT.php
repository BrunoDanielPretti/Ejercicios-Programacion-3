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
    }


?>