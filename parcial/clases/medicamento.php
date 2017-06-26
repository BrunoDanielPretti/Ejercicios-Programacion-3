<?php 
require_once "/AccesoDatos.php";
class Medicamento{
    public $id;
    public $nombre;
    public $precio;
    public $laboratorio;

    public function __construct($pNombre = NULL, $pPrecio = NULL, $pLaboratorio = NULL, $pId = NULL){
        if($pNombre != NULL){
            $this->id = $pId;
            $this->nombre = $pNombre;
            $this->precio = $pPrecio;
            $this->laboratorio = $pLaboratorio;
        }

    }
    public function InsertarMedicamento() 
	 {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT 
                INTO medicamentos (nombre, precio, laboratorio)
                VALUES('$this->nombre','$this->precio','$this->laboratorio')");
            $consulta->execute();
            return $objetoAccesoDato->RetornarUltimoIdInsertado();				
	 }

    public static function TraerTodosLosMed()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, nombre, precio, laboratorio FROM medicamentos");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Medicamento");		
	}

    public static function TraerUnMedicamento($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, nombre, precio, laboratorio FROM medicamentos WHERE id = $id");
			$consulta->execute();
			$Buscado= $consulta->fetchObject('Medicamento');
			return $Buscado;							
	}

    public static function BorrarMedicamento($id)
	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $miMed = self::TraerUnMedicamento($id);
			$consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM medicamentos WHERE id=$id");						
			$consulta->execute();
            
            $respuesta = new stdclass();
            $respuesta->pelota = $miMed;
            $respuesta->cantidad = $consulta->rowCount();
			return $respuesta;
	}


}

?>