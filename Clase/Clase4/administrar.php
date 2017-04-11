<?php

    $destino = "archivos/".$_FILES["foto"]["name"];  //String de la direccion
    $flag = true;  
    $tipoDeArchivo = $_FILES["foto"]["type"];
    //echo $tipoDeArchivo;

    if($tipoDeArchivo != "image/jpeg" && $tipoDeArchivo != "image/png") //Verifica q sea JPEG o PNG
    {
        echo "No es una imagen";
        $flag = false;
    }

    if($_FILES["foto"]["size"] > 1000000) //verifica el peso
    {
        echo "El Archivo es muy pesado: ".$_FILES["foto"]["size"]."b";
        $flag = false;
    }

    if(file_exists($destino))
    {
        echo "El Archivo ya existe";
        copy($destino, "backup/koalaviejo.jpeg");
        $flag = false;
    }


    if($flag)
    {
       
        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino); //tiene q ser haci
        echo '<img src="'.$destino.'" height="100" width="100" >';

    }
    
    
?>