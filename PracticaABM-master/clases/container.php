<?php
    class Container{
        public $numero;
        public $descripcion;
        public $pais;
        public $foto;

        public function __construct($numero = NULL, $descripcion = NULL, $pais = NULL, $foto = NULL){
            if($descripcion != NULL){
                $this->numero = $numero;
                $this->descripcion = $descripcion;
                $this->pais = $pais;
                $this->foto = $foto;  
            }
        }

        public function ToString(){
            return $this->numero." - ".$this->descripcion." - ".$this->pais." - ";
        }

        public function InsertarContainer(){
            $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT into container (numero,descripcion,pais,foto)values('$this->numero','$this->descripcion','$this->pais','$this->foto')");

            $consulta->execute();
        }

        public static function TraerTodoLosContainer(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select numero,descripcion as descripcion, pais as pais,foto as foto from container");
            $consulta->execute();   
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Container");
        }

        public static function MostrarContainer(){
            $listaContainer = Container::TraerTodoLosContainer();
            
            $datos = "<ul>";
            foreach ($listaContainer as $key) {
                
                $datos .= "<li>";
                $datos .= $key->ToString();
                $datos .= "<img src="."$key->foto"." height=25% width=25% >";
                $datos .= "<button onclick="."modificar('$key->numero')"." class='btn btn-primary'>Modificar</button> ";
                $datos .= "<button onclick="."borrar('$key->numero')"." class='btn btn-danger'>Borrar</button>";
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            return $datos;
        }

        public function BorrarContainer(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from container     
            WHERE numero=:numero"); 
            $consulta->bindValue(':numero',$this->numero, PDO::PARAM_INT);  
            $consulta->execute();
            return $consulta->rowCount();
        }

        public function ModificarContainer(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            
            $consulta =$objetoAccesoDato->RetornarConsulta("
                update container 
                set descripcion='$this->descripcion',
                pais='$this->pais',
                foto='$this->foto'
                WHERE numero='$this->numero'");
            return $consulta->execute();            
        }

    }
?>