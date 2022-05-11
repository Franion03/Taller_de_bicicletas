<?php
    session_start();
    if($_SESSION["autentificado"]!=1)
        header("Location: login.html")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fran Quiles</title>
</head>
<body>
    <?php
        include("conexion.php");
        $arrayBorrados=$_POST["borrar"];
        $error=0;
        for($i=0; $i<count($arrayBorrados);$i++)
        {
            $sentenciaSQL="DELETE from clientes where Id_Cliente='$arrayBorrados[$i]'";
            $result=$conexion->query($sentenciaSQL);
            
            if(!$result)
            {
                $error=1;
            }
        }
        if($error==0)
        {
            echo "<br><br>El (Los) Clientes (s) se ha (n) eliminado correctamente.";
        }
    ?>
</body>
</html>