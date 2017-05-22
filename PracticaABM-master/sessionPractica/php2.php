<?php

    session_start();//permite trabajar con sesion en la pagina
    if(isset($_SESSION["palabra"])){
        echo $_SESSION["palabra"];
    }else{
        echo "No esta setteada la sesion";
    }

    echo "<br><a href='html1.html'>Ir a html</a>";
?>