<?php

    class Fabrica
    {
        private $_empleados;
        private $_razonSocial;

        


        public function __construct($pRazonSocial)
        {            
            $this->_razonSocial = $pRazonSocial;
            $this->_empleados = array();
            $this->TraerFabrica();
        }

        public function AgregarEmpleado($pPersona)
        {
            array_push($this->_empleados, $pPersona);
        }

        public function CalcularSueldos()
        {}

        public function EliminarEmpleado($pEmpleado)
        {
 
            for($i=0; $i<count($this->_empleados); $i++)
            {
                if($this->_empleados[$i]->getLegajo() == $pEmpleado->getLegajo() )
                {
                    unset( $this->_empleados[$i] );                    
                }
            }
        }

        public function EliminarEmpleadosRepetidos()
        {                       
         
        }

        public function ToString()
        {
            $String1 = "";
            foreach ($this->_empleados as $key)
            {
                $String1 = $String1.$key->ToString()."<br>";                
            }
            return $String1;            
        }

        public function GuardarFabrica()
        {
            $fichero = fopen("fabrica.txt", "w");
            foreach ($this->_empleados as $key)
            {
                fwrite($fichero , $key->ToString()."\r\n" );                
            }
            fclose($fichero);
            
        }

        public function TraerFabrica()
        {
            $file = fopen("fabrica.txt", "r");
            $miArray = array();

            while( !feof($file) )
            {
                $linea = fgets($file);
                $miArray = explode(" - ", $linea) ;                

                if( $miArray[0] != "" ) //preguntar al profesor q onda
                {
                    $empleado = new Empleado($miArray[0], $miArray[1], $miArray[2], $miArray[3], $miArray[4], $miArray[5]);             
                    array_push($this->_empleados, $empleado);
                }
                
                                  
            }
            
            
            fclose($file);                
        }

        
        //Imprime directamente lo q esta en el archivo
        public static function ImprimirArchivo()
        {
            $file = fopen("fabrica.txt", "r");

            while(!feof($file))
            {
                echo fgets($file)."<br>";
            }
            fclose($file);
        }
        
        
        

    }


        
?>