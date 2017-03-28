<?php
    require_once "rectangulo.php";
    require_once "triangulo.php";

    $miRectangulo = new Rectangulo(5, 9);
    echo $miRectangulo->ToString();
    echo "<br><br>";
    $miTriangulo = new Triangulo(8,8);
    echo $miTriangulo->ToString();

?>