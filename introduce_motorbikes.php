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

    <form action="insert_motorbikes.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td> Matricula: </td>
                <td><input type="text" name="matricula"><br></td>
            </tr>
            <tr>
                <td>Modelo: </td>
                <td><input type="text" name="modelo"><br></td>
            </tr>
            <tr>
                <td>Marca: </td>
                <td><input type="text" name="marca"><br></td>
            </tr>
            <tr>
                <td>Año: </td>
                <td><input type="text" name="año"><br></td>
            </tr>
            <tr>
                <td>Color: </td>
                <td><input type="text" name="color"><br></td>
            </tr>
            <tr>
                <td>Dni Cliente: </td>
                <td>
                    <select name="id_cliente" >
                        <?php
                            include("conexion.php");
                            include("eliminar_temporales.php");
                            $sql="SELECT DNI, Id_Cliente FROM clientes";

                            $result = $conn->query($sql);
                            $rows= $result->fetchAll();

                            foreach($rows as $row)
                            {
                                $dni=$row['DNI'];
                                $id=$row['Id_Cliente'];

                                echo "<option value=$id>$dni</option>";
                            }
                        ?>
                    </select><br>
                </td>
            </tr>   
        </table>
        <input type="submit" value="Introducir Motocicleta">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>