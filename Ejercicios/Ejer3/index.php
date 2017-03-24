<?php

    $a= rand(1, 10);
    $b= rand(1, 10);
    $c= rand(1, 10);

    echo "a= ".$a."<br>b= ".$b."<br>c= ".$c."<br><br>";

    if (($b < $a && $a < $c) || ($c < $a && $a < $b)) 
    {
	echo "a: $a";
    }
    else if(($a < $b && $b < $c) || ($c < $b && $b < $a))
    {
        echo "b: $b";
    }
    else if (($b < $c && $c < $a) || ($a < $c && $c < $b))
    {
        echo "c: $c";
    }
    else
    {
        echo "No hay valor medio";
    }

  



?>