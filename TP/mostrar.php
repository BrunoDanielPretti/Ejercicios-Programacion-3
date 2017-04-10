<?php
    require_once "empleado.php";

    $file = fopen("empleados.txt", "r");
            $miArray = array();
            $arrayEmpleados = array();
            while( !feof($file) )
            {
                $linea = fgets($file);
                $miArray = explode(" - ", $linea) ;                

                if( $miArray[0] != "" ) //preguntar al profesor q onda
                {
                    $empleado = new Empleado($miArray[0], $miArray[1], $miArray[2], $miArray[3], $miArray[4], $miArray[5]);             
                    array_push($arrayEmpleados, $empleado);
                }                                                  
            }
                       
            fclose($file);              

            foreach ($arrayEmpleados as $key)
            {
                echo $key->ToString();
                echo "<br>";
            }

?>