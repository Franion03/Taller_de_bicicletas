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
    <title>Fran Quiles</title>
</head>
<body>
    <?php
        include("conexion.php");
        $arrayBorrados=$_POST["borrar"];
        $error=0;
        for($i=0; $i<count($arrayBorrados);$i++)
        {
            $sentenciaSQL="DELETE from facturas where Numero_Factura='$arrayBorrados[$i]'";
            $result=$conn->query($sentenciaSQL);
            
            if(!$result)
            {
                $error=1;
            }
            $sentenciaSQL="DELETE from detalle_factura where Numero_Factura='$arrayBorrados[$i]'";
            $result=$conn->query($sentenciaSQL);
            
            if(!$result)
            {
                $error=1;
            }
        }
        if($error==0)
        {
            echo "<br><br>La (Las) factura (es) se ha (n) eliminado correctamente.";
        }
    ?>
</body>
</html>