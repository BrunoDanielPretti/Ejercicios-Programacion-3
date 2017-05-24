<?php
    class Producto{
        public $informacion;
        public $imagen;        

        public function __construct($pInformacion,$pImagen){
            $this->informacion = $pInformacion;
            $this->imagen = $pImagen;            
        }

        
        public function ToString(){
            return "$this->informacion - $this->imagen";
        }

        public function GuardarProducto(){
            $arch = fopen("../archivos/productos.txt","a+");
            fwrite($arch,$this->ToString()."\r\n");
            fclose($arch);
        }

        public static function TraerProductosDeTxt(){
            $listaPersonas = array();

            $arch = fopen("../archivos/productos.txt","r");
            while(!feof($arch)){
                $linea = fgets($arch);
                $auxPersona = explode(" - ",$linea);
                $auxPersona[0] = trim($auxPersona[0]);
                
                if($auxPersona[0]!=""){
                    $listaPersonas[] = new Producto(trim($auxPersona[0]),trim($auxPersona[1]));
                }
            }
            fclose($arch);
            return $listaPersonas;
        }

        public static function MostrarProductosVector(){
            $listaPersonas = Producto::TraerProductosDeTxt();            
            $datos = "<ul>";
            foreach ($listaPersonas as $key) {
                
                $datos .= "<li>";
                $datos .= $key->ToString();
                //$datos .= "<button onclick="."modificar('$key->_nombre')"." class='btn btn-primary'>Modificar</button> ";
                $datos .= "<img src="."$key->imagen"." height=25% width=25% >";
                $datos .= "<button onclick="."borrarProducto('$key->informacion')"." class='btn btn-danger'>Borrar</button>";
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            return $datos;
        }

        public static function BorrarPorInfo($pinfo){
            $listaPersonas = Producto::TraerProductosDeTxt();            

            for ($i=0; $i < count($listaPersonas); $i++) { 
                if($listaPersonas[$i]->informacion==$pinfo)
                {
                    unset($listaPersonas[$i]);
                }
            }
            Producto::GuardarArrayProductos($listaPersonas);
        }

        public static function GuardarArrayProductos($pProducto){
            $arch = fopen("../archivos/productos.txt","w");
            foreach ($pProducto as $key) {
                fwrite($arch,$key->ToString()."\r\n");
            }
            fclose($arch);
        }
        /*
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

        

        

        public static function BorrarPersona($pPersona){
            $listaPersonas = Persona::TraerPersonasDeTxt();

            for ($i=0; $i < count($listaPersonas); $i++) { 
                if($listaPersonas[$i]==$pPersona)
                {
                    unset($listaPersonas[$i]);
                }
            }
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
        */
    }
?>