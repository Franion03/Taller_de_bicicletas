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
    <style>
	table, th, td {
		border-bottom:  1px solid black;
	 	border-collapse: collapse;
	}
	th, td {
	  padding: 5px;
	}
	</style>
</head>
<body>

    <form action="delete_inovice.php" method="POST">
        <table>
            <tr>
                <td>Eliminar</td>
                <td>Detalles/Editar</td>
                <td>Numero Factura</td>
                <td>Matricula</td>
                <td>Mano de Obra</td>
                <td>Precio Hora</td>
                <td>Fecha Emision</td>
                <td>Fecha Pago</td>
                <td>Base Imponible</td>
                <td>IVA</td>
                <td>Total</td>
            </tr>
            <?php
                include("conexion.php");
                $id_cliente=$_POST["id_cliente"];
                $start_date=$_POST["start"];
                $end_date=$_POST["end"];
                $sql="SELECT Distinct * FROM facturas , motocicletas
                where  facturas.Matricula = motocicletas.Matricula AND  ( motocicletas.Id_Cliente = $id_cliente or
                     DATE(Fecha_Pago) BETWEEN '$start_date' AND '$end_date' )
                    ";

                $result = $conn->query($sql);
                $rows= $result->fetchAll();

                foreach ($rows as $row){
                    $numero_factura=$row['Numero_Factura'];
                    $matricula=$row['Matricula'];
                    $mano_de_obra=$row['Mano_Obra'];
                    $precio_hora=$row['Precio_Hora'];
                    $fecha_emision=$row['Fecha_Emision'];
                    $fecha_pago=$row['Fecha_Pago'];
                    $base_imponible=$row['Base_Imponible'];
                    $iva=$row['IVA'];
                    $total=$row['Total'];


                    
                    echo "<tr>
                    <td><center><input type=checkbox name=borrar[] value=$numero_factura></center></td>
                    <td><center><a href=edit_inovice.php?id=$numero_factura> ✏️ </a></center></td>
                    <td>$numero_factura</td>
                    <td>$matricula</td>
                    <td>$mano_de_obra</td>
                    <td>$precio_hora</td>
                    <td>$fecha_emision</td>
                    <td>$fecha_pago</td>
                    <td>$base_imponible</td>
                    <td>$iva</td>
                    <td>$total</td>
                    </tr>";
                
                }
            ?>
        </table>
        <br>
        <input type="submit" value="Eliminar Facturas Seleccionadas">
        <input type="reset" value="Deseleccionar Todos">
        <p><a href="introduce_inovices.php">Agregar factura</a></p>
    </form>
</body>
</html>
