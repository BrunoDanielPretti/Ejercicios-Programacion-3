<?php    
    session_start();
    if(isset($_SESSION["registrado"]) ){
        $_SESSION["registrado"] = null;
        session_destroy();
        echo "Sesion Cerrada";
    }else{
        echo "No ah iniciado Sesion";
    }
    
    
    
?>