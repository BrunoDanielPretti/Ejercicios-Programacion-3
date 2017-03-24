<?php

echo date("d")."/".date("m")."/".date("y");


$dia = date('z');
$dia = 170;
    
    if ( $dia < 79 )
    {
        $estacion = 'Verano';    
    } 
    elseif ( $dia < 172 )
    {
        $estacion = 'Otoño'; 
    }
    elseif ( $dia < 265 )
    {
        $estacion = 'Invierno';
    }
    elseif ( $dia < 352 )
    {
        $estacion = 'Primavera';
    } 
    else 
    {
        $estacion = 'Verano';
    }

echo "<br>Estacion: ".$estacion;    

?>

