<?php
    var_dump($_REQUEST);     
    //Variable super global de php, toma todo, venga por geo o por post
    echo "<br>";

    var_dump($_POST);
    echo "<br>";

    $nombre = $_POST['Nombre'];
    
    if( isset($_POST['subGuardar']) )
    {
        $archivo = fopen("datos.txt", "w");
            fwrite($archivo, $nombre);
        fclose($archivo);
    }

    if( isset($_POST['subLeer']) )
    {
         $archivo = fopen("datos.txt", "r");
            echo fread($archivo, filesize("datos.txt"));
         fclose($archivo);
    }
    
?>