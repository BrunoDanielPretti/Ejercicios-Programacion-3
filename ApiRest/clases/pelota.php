<?php
class Pelota{
    public $id;
    public $nombre;
    public $color;
    

     public function InsertarPelota() 
	 {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO pelotas (nombre, color)VALUES('$this->nombre','$this->color')");
            $consulta->execute();
            return $objetoAccesoDato->RetornarUltimoIdInsertado();				
	 }

    public static function TraerTodasLasPelotas()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, nombre, color FROM pelotas");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Pelota");		
	}

    public static function TraerUnaPelota($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, nombre, color FROM pelotas WHERE id = $id");
			$consulta->execute();
			$Buscado= $consulta->fetchObject('Pelota');
			return $Buscado;							
	}

    public static function BorrarPelota($id)
	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $miPelota = self::TraerUnaPelota($id);
			$consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM pelotas WHERE id=$id");						
			$consulta->execute();
            
            $respuesta = new stdclass();
            $respuesta->pelota = $miPelota;
            $respuesta->cantidad = $consulta->rowCount();
			return $respuesta;
	}

    public function ModificarPelota()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE pelotas 
            SET 
            nombre='$this->nombre',
            color='$this->color'
            WHERE pelotas.id='$this->id'");            
        return $consulta->execute();
    }

}//Fin Class Pelota   



?>