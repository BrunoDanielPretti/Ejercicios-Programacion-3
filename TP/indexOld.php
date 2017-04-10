<?php
    require_once "persona.php";
    require_once "empleado.php";
    require_once "fabrica.php";

    $miPersona = new empleado("Bruno", "Pretti", 36806053, 'm', 10, 1000);
    $per1 = new empleado("Marina", "Meza", 12053554, 'm', 20, 2000);
    $per2 = new empleado("Puchi", "Perro", 33333333, 'm', 30, 3000);
    $per3 = new empleado("Ñandu", "Perez", 44444444, 'm', 40, 4000);
    echo $miPersona->ToString()."<br>";
    echo $miPersona->Hablar("español");
    echo "<br>asd<br><br>";

    $miFabrica = new Fabrica("Le Fabrica");
    /*
    $miFabrica->AgregarEmpleado($miPersona);
    $miFabrica->AgregarEmpleado($per1);
    $miFabrica->AgregarEmpleado($per2);
    $miFabrica->AgregarEmpleado($per3);
    */

    echo "to string: <br>";
    //echo $miFabrica->ToString();
    //$miFabrica->EliminarEmpleado($miPersona);
    //$miFabrica->ToString();

    //$miFabrica->GuardarFabrica();

    //echo "------------------------------------<br>";
    //Fabrica::ImprimirArchivo();
    //$miFabrica->TraerFabrica();
    //$miFabrica->AgregarEmpleado($per1);
    //$miFabrica->EliminarEmpleadosRepetidos();
    echo $miFabrica->ToString();
    
?>