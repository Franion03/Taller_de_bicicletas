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

    <form action="delete_motorbikes.php" method="POST">
        <table>
            <tr>
                <td>Eliminar</td>
                <td>Detalles/Editar</td>
                <td>Matricula</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Año</td>
                <td>Color</td>
                <td>Id_Cliente</td>
            </tr>
            <?php
                include("conexion.php");
                $sql="SELECT * FROM motocicletas";

                $result = $conn->query($sql);
                $rows= $result->fetchAll();

                foreach ($rows as $row){
                    $matricula=$row['Matricula'];
                    $marca=$row['Marca'];
                    $modelo=$row['Modelo'];
                    $año=$row['Anyo'];
                    $color=$row['Color'];
                    $id_cliente=$row['Id_Cliente'];


                    
                    echo "<tr>
                    <td><center><input type=checkbox name=borrar[] value=$matricula></center></td>
                    <td><center><a href=edit_motorbikes.php?id=$matricula> ✏️ </a></center></td>
                    <td>$matricula</td>
                    <td>$marca</td>
                    <td>$modelo</td>
                    <td>$año</td>
                    <td>$color</td>
                    <td>$id_cliente</td>
                    </tr>";
                
                }
            ?>
        </table>
        <br>
        <input type="submit" value="Eliminar motocicletas Seleccionadas">
        <input type="reset" value="Deseleccionar Todos">
        <p><a href="introduce_motorbikes.php">Agregar embarcacion</a></p>
    </form>
</body>
</html>
