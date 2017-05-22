<?php
    class Persona{
        public $_nombre;
        public $_apellido;
        public $_numero;

        public function __construct($pNombre,$pApellido,$pNumero){
            $this->_nombre = $pNombre;
            $this->_apellido = $pApellido;
            $this->_numero = $pNumero;
        }

        public function ToString(){
            return "$this->_nombre - $this->_apellido - $this->_numero";
        }

        public function GuardarPersona(){
            $arch = fopen("../archivos/personas.txt","a+");//a+ -> append + crear si no existe
            fwrite($arch,$this->ToString()."\r\n");
            fclose($arch);
        }

        public static function MostrarArchivo(){
            $arch = fopen("../archivos/personas.txt","r");
            $datos = "<ul>";
            while(!feof($arch)){
                $datos .= "<li>";
                $datos .= fgets($arch);
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            fclose($arch);
            return $datos;
        }

        public static function TraerPersonasDeTxt(){
            $listaPersonas = array();

            $arch = fopen("../archivos/personas.txt","r");
            while(!feof($arch)){
                $linea = fgets($arch);
                $auxPersona = explode(" - ",$linea);
                $auxPersona[0] = trim($auxPersona[0]);
                
                if($auxPersona[0]!=""){
                    $listaPersonas[] = new Persona(trim($auxPersona[0]),trim($auxPersona[1]),trim($auxPersona[2]));
                }
            }
            fclose($arch);
            return $listaPersonas;
        }

        public static function MostrarPersonasVector(){
            $listaPersonas = Persona::TraerPersonasDeTxt();
            $string = "marina";
            $datos = "<ul>";
            foreach ($listaPersonas as $key) {
                
                $datos .= "<li>";
                $datos .= $key->ToString();
                $datos .= "<button onclick="."modificar('$key->_nombre')"." class='btn btn-primary'>Modificar</button> ";
                $datos .= "<button onclick="."borrar('$key->_nombre')"." class='btn btn-danger'>Borrar</button>";
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            return $datos;
        }

        public static function BorrarPersona($pPersona){
            $listaPersonas = Persona::TraerPersonasDeTxt();

            for ($i=0; $i < count($listaPersonas); $i++) { 
                if($listaPersonas[$i]==$pPersona)
                {
                    unset($listaPersonas[$i]);
                }
            }
        }

        public static function BorrarPorNombre($pPersona){
            $listaPersonas = Persona::TraerPersonasDeTxt();

            for ($i=0; $i < count($listaPersonas); $i++) { 
                if($listaPersonas[$i]->_nombre==$pPersona)
                {
                    unset($listaPersonas[$i]);
                }
            }
            Persona::GuardarArrayPersona($listaPersonas);
        }

        public function ModificarPorNombre($pPersona){
            $listaPersonas = Persona::TraerPersonasDeTxt();

            for ($i=0; $i < count($listaPersonas); $i++) { 
                if($listaPersonas[$i]->_nombre==$pPersona)
                {
                    $listaPersonas[$i]->_nombre = $this->_nombre;
                    $listaPersonas[$i]->_apellido = $this->_apellido;
                    $listaPersonas[$i]->_numero = $this->_numero;
                }
            }
            Persona::GuardarArrayPersona($listaPersonas);
        }

        public static function GuardarArrayPersona($pPersonas){
            $arch = fopen("../archivos/personas.txt","w");
            foreach ($pPersonas as $key) {
                fwrite($arch,$key->ToString()."\r\n");
            }
            fclose($arch);
        }

        public static function RecuperarDeBackup(){
            
            $listaPersonas = array();

            $arch = fopen("../archivos/personas_bup.txt","r");
            while(!feof($arch)){
                $linea = fgets($arch);
                $auxPersona = explode(" - ",$linea);
                $auxPersona[0] = trim($auxPersona[0]);
                
                if($auxPersona[0]!=""){
                    $listaPersonas[] = new Persona(trim($auxPersona[0]),trim($auxPersona[1]),trim($auxPersona[2]));
                }
            }
            fclose($arch);
            Persona::GuardarArrayPersona($listaPersonas);
        }
    }
?>