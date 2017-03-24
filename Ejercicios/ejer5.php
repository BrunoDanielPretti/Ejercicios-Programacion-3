<?php

    $num = (string) rand(20, 60);
    //$num = (string) $num;

    echo "num= $num<br>";

    switch ($num[0]) {
        case '2':
            if($num[1] == 0)
                echo "Veinte";
            else 
                echo "Veinti";
            break;
        case '3':
            if($num[1] == 0)
                echo "Treinta";
            else 
                echo "Treinta y ";
            break;
        case '4':
            if($num[1] == 0)
                echo "Cuarenta";
            else 
                echo "Cuarenta y ";
            break;
        case '5':
            if($num[1] == 0)
                echo "Cincuenta";
            else 
                echo "Cincuenta y ";
            break;
        case '6':
            if($num[1] == 0)
                echo "Sesenta";
            else 
                echo "Sesenta y ";
            break;
        
        default:
            # code...
            break;       
    }
    switch ($num[1]) {
        case '1':
            echo "uno";
            break;
        case '2':
            echo "dos";
            break;
        case '3':
            echo "tres";
            break;
        case '4':
            echo "cuatro";
            break;
        case '5':
            echo "cinco";
            break;
        case '6':
            echo "seis";
            break;
        case '7':
            echo "siete";
            break;
        case '8':
            echo "ocho";
            break;
        case '9':
            echo "nueve";
            break;

        default:
            # code...
            break;
    }

?>