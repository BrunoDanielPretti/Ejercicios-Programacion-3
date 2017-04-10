<?php    
    require_once "empleado.php";

    //var_dump($_POST);
    $miEmpleado = new Empleado($_POST["txtNombre"], $_POST["txtApellido"], $_POST["txtDNI"], $_POST["txtSexo"], $_POST["txtLegajo"], $_POST["txtSueldo"]);
    //echo $miEmpleado->ToString();

    $fichero = fopen("Empleados.txt", "a");   
    fwrite($fichero , $miEmpleado->ToString()."\r\n" );                 
    fclose($fichero);

    echo '<a href="mostrar.php"> Ola q ase</a>';


?>