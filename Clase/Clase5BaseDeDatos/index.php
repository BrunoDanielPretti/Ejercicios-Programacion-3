<?php
    $conexion = mysqli_connect("localhost", "root", "", "mibase"); //Direccion, Cuenta, contraseñña, base de datos
    $id = 2;
    $textoConsulta = "SELECT * FROM proveedores";
    //var_dump($textoConsulta);
    $consulta = mysqli_query($conexion, $textoConsulta );
    //var_dump($consulta);
    $filas = mysqli_fetch_object($consulta);
    var_dump($filas);




?>