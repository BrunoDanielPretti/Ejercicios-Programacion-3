<?php
// Primer Ejercicio
/*
paginas:
    twarc
    000webhost
    hostinger
*/


$nombre= "Bruno";
echo $nombre."<br>";
echo "Hola Mundo ".$nombre;
echo "<br><br><br>";

$acum = 0;
$cont = 1;

while($acum + $cont <= 1000)
{   
    echo $acum."+".$cont; 
    $acum += $cont;
    echo "=".$acum."<br>";
    $cont++;
    
}
//echo "<br>Acumulado=".$acum."<br>";
echo "<br>Cantidad de numeros Sumados=".$cont."<br>";

?>

