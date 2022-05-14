<?php
    session_start();
    if($_SESSION["autentificado"]!= "SI"){
        header("Location: index.php?errorusuario=si");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Menu inicial</h1>
    <a href="lista_clientes.php">Lista de clientes</a>
    <a href="lista_embarcaciones.php">Lista de embarcaciones</a>
    <a href="lista_repuestos.php">Lista de repuestos</a>
    <a href="lista_facturas.php">Lista de facturas</a>
    <a href="cerrar_sesion.php">Cerrar Session</a> <br><br>
    <?php
        include("conexion.php");
        $arrayBorrados=$_POST["borrar"];
        $error=0;
        for($i=0; $i<count($arrayBorrados);$i++)
        {
            $sentenciaSQL="DELETE from motocicletas where Matricula='$arrayBorrados[$i]'";
            $result=$conn->query($sentenciaSQL);
            
            if(!$result)
            {
                $error=1;
            }
        }
        if($error==0)
        {
            echo "<br><br>La (Las) Motocicletas (es) se ha (n) eliminado correctamente.";
        }
    ?>
</body>
</html>