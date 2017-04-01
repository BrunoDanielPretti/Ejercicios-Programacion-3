<?php
    $Numeros = array();

    for($i=0; $i<10; $i++)
    {
        if(($i%2) != 0)
        {
           array_push($Numeros, $i);
        }
    }

    for($i=0; $i<count($Numeros); $i++ )
    {
        echo "$Numeros[$i]<br>";
    }

    echo "------<br>";  
    $i=0;
    while ($i < count($Numeros)) 
    {       
        echo current($Numeros)."<br>";
        next($Numeros);
        $i++;
    }
    echo "------<br>";  
    foreach ($Numeros as $key)
    {
        echo $key."<br>";
    } 
    
   

    //var_dump($Numeros);
?>