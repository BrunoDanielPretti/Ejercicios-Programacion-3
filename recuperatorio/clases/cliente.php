<?php
    class Cliente{
        public $nombre;
        public $correo;
        public $clave;
        public $edad;

        public function __construct($nombre = NULL, $correo = NULL, $clave = NULL, $edad = NULL){
            if($correo != NULL){
                $this->nombre = $nombre;
                $this->correo = $correo;
                $this->clave = $clave;
                $this->edad = $edad;  
            }
        }       

        public function ToString(){
            return $this->correo." - ".$this->nombre." - ".$this->edad;
        }

        public function InsertarCliente(){
            $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT into clientes (nombre,correo,clave,edad)values('$this->nombre','$this->correo','$this->clave','$this->edad')");

            $consulta->execute();
        }
        
        public static function TraerTodoLosClientes(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select nombre,correo as correo, clave as clave,edad as edad from clientes");
            $consulta->execute();   
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Cliente");
        }

        public static function BuscarPorSesion($pCorreo, $pClave){
            $listaClientes = Cliente::TraerTodoLosClientes();

            for ($i=0; $i < count($listaClientes); $i++) { 
                if($listaClientes[$i]->correo == $pCorreo && $listaClientes[$i]->clave == $pClave)
                {
                    return true;
                }
            }
            return false;
        }
        
        public static function MostrarCliente(){
            $listaClientes = Cliente::TraerTodoLosClientes();
            
            $datos = "<ul>";
            foreach ($listaClientes as $key) {
                
                $datos .= "<li>";
                $datos .= $key->ToString();                               
                $datos .= "<button onclick="."borrar('$key->correo')"." class='btn btn-danger btn-xs'>Borrar</button>";
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            return $datos;
        }

        public function BorrarCliente(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from clientes     
            WHERE correo=:correo"); 
            $consulta->bindValue(':correo',$this->correo, PDO::PARAM_INT);  
            $consulta->execute();
            return $consulta->rowCount();
        }

        public static function BorrarPorCorreo($pMail){
            $listaClientes = Cliente::TraerTodoLosClientes();

            for ($i=0; $i < count($listaClientes); $i++) { 
                if($listaClientes[$i]->correo == $pMail)
                {
                   $listaClientes[$i]->BorrarCliente();
                }
            }
            
        }
              
    }
?>