<?php
    require_once "../clases/personas.php";

    //Persona::ModificarPorNombre($_POST["nombre"]);
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $numero = $_POST["numero"];
    $nombreB = $_POST["nombreB"];
    

    $persona = new Persona($nombre,$apellido,$numero);
    $persona->ModificarPorNombre($_POST["nombreB"]);

?>