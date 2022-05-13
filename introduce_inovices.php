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
    <style>
	th, td {
	  padding: 5px;
	}
	</style>
</head>
<body>

    <form action="insert_inovices.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Numero de factura: </td>
                <td><input type="text" name="numero_factura" readonly value="<?php
                    include("conexion.php");
                    $sql="SELECT max(Numero_Factura) as maximo from facturas";
                    $result = $conn->query($sql);
                    $rows= $result->fetchAll();

                    foreach($rows as $row)
                    {
                        $max=$row['maximo'];

                        echo $max+1;
                    }
                ?>"><br></td>
            </tr>
            <tr>
                <td> Matricula: </td>
                <td>
                    <select name="matricula" >
                        <?php
                                $sql="SELECT Matricula FROM motocicletas";

                                $result = $conn->query($sql);
                                $rows= $result->fetchAll();

                                foreach($rows as $row)
                                {
                                    $matricula=$row['Matricula'];

                                    echo "<option value=$matricula>$matricula</option>";
                                }
                            ?>
                        </select><br>
                </td>
            </tr>
            <tr>
                <td>Mano de obra: </td>
                <td><input type="text" name="mano_de_obra"><br></td>
            </tr>
            <tr>
                <td>Precio por hora: </td>
                <td><input type="text" name="precio_hora"><br></td>
            </tr>
            <tr>
                <td>Fecha de emision: </td>
                <td><input type="text" name="fecha_emision" placeholder="YYYY-MM-DD"><br></td>
            </tr>
            <tr>
                <td>Fecha de pago: </td>
                <td><input type="text" name="fecha_pago" placeholder="YYYY-MM-DD"><br></td>
            </tr>
            <tr>
                <td>IVA: </td>
                <td><input type="text" name="iva"><br></td>
            </tr>
            
            <tr>
                <td>Repuesto: </td>
                <td>
                    <select name="referencia" >
                        <?php
                            include("conexion.php");
                            include("delete_temporals.php");
                            $sql="SELECT Referencia, Descripcion FROM repuestos";

                            $result = $conn->query($sql);
                            $rows= $result->fetchAll();

                            foreach($rows as $row)
                            {
                                $desc=$row['Descripcion'];
                                $ref=$row['Referencia'];

                                echo "<option value=$ref>$desc</option>";
                            }
                        ?>
                    </select><br>
                </td>
            </tr>
            <tr>
                <td> Unidades: </td>
                <td><input type="text" name="unidades"><br></td>
            </tr>
            
        </table>
        <input type="submit" value="Introducir Factura">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>