<?php
    require_once "../clases/container.php";
    require_once "../clases/AccesoDatos.php";
    
    $container = new Container();
    $container->numero=$_POST['numero'];
    $container->BorrarContainer();
?>