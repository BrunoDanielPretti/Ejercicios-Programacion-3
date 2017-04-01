<?php
    require_once "persona.php";
    require_once "empleado.php";

    $miPersona = new empleado("Bruno", "Pretti", 36806053, 'm', 10, 1000);
    echo $miPersona->ToString()."<br>";
    echo $miPersona->Hablar("español");
    echo "<br>asd";
?>