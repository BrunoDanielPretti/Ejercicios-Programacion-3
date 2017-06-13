<?php
    require_once "vendor/autoload.php";
    use Firebase\JWT\JWT;

    class AutentificadorJWT{
        private static $claveSecreta = "acaVaUnaClaveSecreta";

        public static function CrearToken($datos){
            $ahora = time();
            $playLoad = array(              //el Token
                'IAT' => $ahora,
                'EXP' => $ahora + 60,
                'DATA' => $datos,
                'APP' => "apirest JWT"
            );

            return JWT::encode($playLoad, self::$claveSecreta);
        }

        public static function VirificarToken($pToken){
            $decodificado = JWT::decode($pToken, self::$claveSecreta);
        }
    }


?>