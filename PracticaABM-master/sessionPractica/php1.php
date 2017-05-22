<?php

    session_start();//permite trabajar con sesion en la pagina

    $_SESSION["palabra"] = "cualquier cosa";//palabra es el usuario en este caso

    echo "<a href='html1.html'>Ir a html</a>"
?>