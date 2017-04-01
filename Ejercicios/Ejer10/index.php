<?php

    $lapiceras =array(
        array(
        "color" => "rojo",
        "marca" => "bic",
        "trazo" => "fino",
        "precio"=> 5
        ),

        array(
        "color" => "azul",
        "marca" => "otra",
        "trazo" => "no fino",
        "precio"=> 6
        ),

        array(
        "color" => "Amarrilo",
        "marca" => "otraMarca",
        "trazo" => "grueso",
        "precio"=> 8
        )    
    );

    foreach ($lapiceras as $key) {
        var_dump($key);
        echo "<br>";
    }



?>