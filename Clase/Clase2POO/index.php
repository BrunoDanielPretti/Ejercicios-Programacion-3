<?php
    //include("funciones.php");    Tambien anda
    /*
    include "funciones.php"; //puede incluir varias veces
    include_once "funciones.php"; //incluye solo una vez
    include_once "noexiste.php";
    include_once "funciones.php";
    */    
    include_once "funciones.php"; //incluye solo una vez
    //require "noexiste.php";
    //require "funciones.php";
    
    
    echo "<br>";
    Sumar(1, 5);
    echo "<br>";
    $resultado = sumar(2, 8);
    echo $resultado;
    echo "<br>";
    
    include_once "calculadora.php";
    $resultado = calculadora::Sumar(10, 15);
    echo $resultado;



?>