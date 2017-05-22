<?php
    require_once "../clases/container.php";
    require_once "../clases/AccesoDatos.php";

    $miContainer = new Container($_POST["pNumero"],$_POST["descripcion"],$_POST["pais"],$_POST["foto"]);
    $miContainer->ModificarContainer();
?>