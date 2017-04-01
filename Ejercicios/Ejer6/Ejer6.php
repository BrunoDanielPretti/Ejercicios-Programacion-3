<?php
    //echo "Hola Mundo";
    //var_dump
    /*
    Aplicación Nº 6 (Carga aleatoria)
    Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
    función rand ). Mediante una estructura condicional, determinar si el promedio de los números
    son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
    resultado.
    */
    //Constructor Array
    /*
    $numeros = array(
        rand(1,100),
        rand(1,100),
        rand(1,100),
        rand(1,100),
        rand(1,100)
    );
    */
    //Indices de Array
    /*
    $numeros = array();
    for($i=0; $i<5; $i++)
    {
        $numeros[$i] = rand(1, 100);
    }
    var_dump($numeros);
    */
    //Push
    $numeros = array();
    for($i=0; $i<5; $i++)
    {        
        array_push($numeros, rand(1, 10));        
    }
    var_dump($numeros);
    $acum = 0;
    for($i=0; $i<5; $i++)
    {
        $acum += $numeros[$i];
    }
    echo "<br>Acumulador= ".$acum;
    $acum = $acum/5;
    echo "<br>Promedio= ".$acum."<br>";
    if($acum > 6)
    {
        echo "El promedio es mayor a 6";
    }
    else if($acum < 6 )
    {
        echo "El promedio menor a 6";
    }
    else
    {
        echo "El promedio es igual a 6";
    }
?>