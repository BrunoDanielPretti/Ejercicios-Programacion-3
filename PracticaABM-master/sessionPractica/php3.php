<?php

    session_start();//permite trabajar con sesion en la pagina
    $_SESSION["palabra"] = NULL;
    session_destroy();
    echo "<br><a href='html1.html'>Ir a html</a>";
?>