<?php 
require_once "../clases/producto.php";
session_start();

    if(isset($_SESSION["registrado"]) ){
        echo Producto::MostrarProductosVector();
    }    
    else{
        echo "No esta Loguiado";
    }
   
?>

