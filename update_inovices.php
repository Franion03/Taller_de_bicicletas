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
        $numero_factura=$_POST['numero_factura'];
        $matricula=$_POST['matricula'];
        $mano_de_obra=$_POST['mano_de_obra'];
        $precio_hora=$_POST['precio_hora'];
        $fecha_emision=$_POST['fecha_emision'];
        $fecha_pago=$_POST['fecha_pago'];
        $iva=$_POST['iva'];
        $referencia=$_POST['referencia'];
        $unidades=$_POST['unidades'];
        

        $sql=("SELECT *  FROM repuestos where Referencia=$referencia");

        $result = $conn->query($sql);
        $rows= $result->fetchAll();

        foreach($rows as $row)
        {
            $referencia=$row['Referencia'];
            $importe=$row['Importe'];
            $ganancia=$row['Ganancia'];
        }

        $base_imponible=$unidades*($importe*$ganancia/100);
        $base_imponible=$base_imponible+($mano_de_obra*$precio_hora);

        $total=$base_imponible+($base_imponible*$iva/100);


        $sentenciaSQL=("UPDATE facturas
        set Matricula='$matricula',
        Mano_Obra='$mano_de_obra',
        Precio_Hora='$precio_hora',
        Fecha_Emision='$fecha_emision',
        Fecha_Pago='$fecha_pago',
        Base_Imponible='$base_imponible',
        IVA='$iva',
        Total='$total'
        where Numero_Factura='$numero_factura'");
        $result=$conn->query($sentenciaSQL);
        
        $sentenciaSQL=("UPDATE detalle_factura
        set Referencia='$referencia',
        Unidades='$unidades'
        where Numero_Factura='$numero_factura'");

        $result=$conn->query($sentenciaSQL);
        if(!$result) {
            echo "<br>Error al actualizar la factura en la Base de Datos";
        }
        else{
            echo "<br>La factura se ha actualizado con exito en la base de Datos";
        }
    ?>
</body>
</html>