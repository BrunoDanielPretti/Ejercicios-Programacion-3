<?php
    require_once "../clases/personas.php";

    
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $numero = $_POST["numero"];

    $persona = new Persona($nombre,$apellido,$numero);
    $persona->GuardarPersona($nombre);

?>