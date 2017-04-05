<?php

    class Fabrica
    {
        private $_empleados;
        private $_razonSocial;

        public function __construct($pRazonSocial)
        {
            $this->_razonSocial = $pRazonSocial;
            $this->_empleados = array();
        }

        public function AgregarEmpleado($pPersona)
        {
            array_push($this->_empleados, $pPersona);
        }

        public function CalcularSueldos()
        {}

        public function EliminarEmpleado($pEmpleado)
        {
            /*
            foreach ($this->_empleados as $key)
            {
                if($key->getLegajo() == $pEmpleado->getLegajo() )
                {
                    unset( $this->_empleados[$key] );
                    echo "eliminado<br>";
                }
            }
            */

         

            for($i=0; $i<count($this->_empleados); $i++)
            {
                if($this->_empleados[$i]->getLegajo() == $pEmpleado->getLegajo() )
                {
                    unset( $this->_empleados[$i] );
                    echo "eliminado<br>";
                }
            }
        }

        private function EliminarEmpleadosRepetidos()
        {}

        public function ToString()
        {
            
            echo "Razon Social: $this->_razonSocial<br>";
            foreach ($this->_empleados as $key)
            {
                echo $key->ToString();
                echo "<br>";
            }
            
            /*
            $String1 = "";
            foreach ($this->_empleados as $key)
            {
                $String1 = $String1.$key->ToString()."<br";                
            }
            return $String1;
            */
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

            /*
            while(!feof($file))
            {
                $linea = fgets($file)."<br>";
                array_push($miArray, explode(" - ", $linea) ) ;                
            }
            fclose($file);
            
            echo "<br><br>";
            var_dump($miArray);
            */
                
            while(!feof($file))
            {
                $linea = fgets($file)."<br>";
                $miArray = explode(" - ", $linea) ;                
                                
                $empleado = new Empleado($miArray[0], $miArray[1], $miArray[2], $miArray[3], $miArray[4], $miArray[5]);
                
                echo $empleado->ToString();
                echo "<br>";
            }
            echo "<br><br>";
            
            fclose($file);    
            
        }

        
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