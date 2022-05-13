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
        

        $sql=("SELECT * from repuestos where Referencia=$referencia");

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

        $sql=("insert into detalle_factura(Numero_Factura, Referencia, Unidades) values ('$numero_factura', '$referencia', '$unidades')");
        $result=$conexion->query($sql);
        if(!$result) {
            echo "<br>Error al introducir el detalle en la Base de Datos<br>";
        }
        else{
            echo "<br>El detalle se ha introducido con exito en la base de Datos<br>";
        }
        
        $sql=("insert into factura(Numero_Factura, Matricula, Mano_de_Obra, Precio_Hora, Fecha_Emision, Fecha_Pago, Base_Imponible, IVA, Total) values ('$numero_factura', '$matricula', '$mano_de_obra', '$precio_hora', '$fecha_emision', '$fecha_pago', '$base_imponible', '$iva', '$total')");
        $result=$conexion->query($sql);
        if(!$result) {
            echo "<br>Error al introducir la factura en la Base de Datos";
        }
        else{
            echo "<br>La factura se ha introducido con exito en la base de Datos";
        }
    ?>
</body>
</html>