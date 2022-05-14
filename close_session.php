<?php

    session_start();
    session_destroy();
    echo 'Sesion cerrada';
    header("Location: index.php?errorusuario=si");
    exit();
?>