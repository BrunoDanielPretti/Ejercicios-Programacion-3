<?php
    require_once "../clases/producto.php";

    
    $informacion = $_POST["informacion"];
    $imagen = $_POST["imagen"];
    

    $producto = new Producto($informacion,$imagen);
    $producto->GuardarProducto();

?>