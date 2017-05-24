<?php
    require_once "../clases/cliente.php";
    require_once "../clases/AccesoDatos.php";

    $miCliente = new Cliente($_POST["nombre"],$_POST["mail"],$_POST["clave"],$_POST["edad"]);    
    $miCliente->InsertarCliente();
?>