<?php
    require_once "../clases/cliente.php";
    require_once "../clases/AccesoDatos.php";

    Cliente::BorrarPorCorreo($_POST["parametro"]);
?>