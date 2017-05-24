<?php
    require_once "../clases/cliente.php";
    require_once "../clases/AccesoDatos.php";
    session_start();
    $mail = $_POST["mail"];
    $clave = $_POST["clave"];

    if(Cliente::BuscarPorSesion($mail, $clave) ){        
        setcookie("mail",$mail,  time()+36000 , '/');
        $_SESSION["registrado"] = $mail;
        echo "logueado";
    }else{
        echo "No existe ese usuario";
    }
    
?>