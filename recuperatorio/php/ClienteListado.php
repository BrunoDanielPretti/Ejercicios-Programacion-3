<?php
    require_once "../clases/Cliente.php";
    require_once "../clases/AccesoDatos.php";
    session_start();

    if(isset($_SESSION["registrado"]) ){
        echo Cliente::MostrarCliente();
    }else{
        echo "Necesita logearce";
    }
    
?>