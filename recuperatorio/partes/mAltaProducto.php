<?php 
session_start();

    if(isset($_SESSION["registrado"]) ){
?>
    Nombre: <input type="text" id="txtInformacion" value=""><br>
    Imagen: <input type="file" id="miImagen">
    <input type="button" class="btn btn-success" value="Alta" onclick="AltaProducto()">
<?php        
    }else{
        echo "Necesita logearce";
    }
?>

