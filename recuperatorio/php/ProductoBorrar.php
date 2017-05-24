<?php
    require_once "../clases/producto.php";

    Producto::BorrarPorInfo($_POST["informacion"]);
    echo "Producto Borrado";
?>