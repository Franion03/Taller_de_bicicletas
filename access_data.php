<!DOCTYPE html>
<?php
    
    session_start();
    
    function closeSession(){
        if($_SESSION["autentificado"]!= "SI"){
            header("Location: index.php?errorusuario=si");
            exit();
        }
    }
                
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fran Quiles</title>
</head>
<body>
    <header>
        <a onclick=closeSession() href="list_clients.php">Cerrar Sesion</a>
    </header>
    <section>
        <a href="list_clients.php">Clientes</a>
        <a href="list_motorbike.php">Motocicletas</a>
        <a href="list_spares.php">Repuestos</a>
        <a href="list_inovice.php">Facturas</a>
    </section>
</body>
</html>