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
    <h1>Menu inicial</h1>
    <a href="lista_clientes.php">Lista de clientes</a>
    <a href="lista_embarcaciones.php">Lista de embarcaciones</a>
    <a href="lista_repuestos.php">Lista de repuestos</a>
    <a href="lista_facturas.php">Lista de facturas</a>
    <a href="cerrar_sesion.php">Cerrar Session</a> <br> <br>

    <form action="delete_spares.php" method="POST">
        <table>
            <tr>
                <td>Eliminar</td>
                <td>Detalles/Editar</td>
                <td>Referencia</td>
                <td>Descripcion</td>
                <td>Importe</td>
                <td>Ganancia</td>
            </tr>
            <?php
                include("conexion.php");
                include("delete_temporals.php");
                $sql="SELECT * FROM repuestos";

                $result = $conn->query($sql);
                $rows= $result->fetchAll();

                foreach ($rows as $row){
                    $referencia=$row['Referencia'];
                    $descripcion=$row['Descripcion'];
                    $importe=$row['Importe'];
                    $ganancia=$row['Ganancia'];
                    
                    echo "<tr>
                    <td><center><input type=checkbox name=borrar[] value=$referencia></center></td>
                    <td><center><a href=edit_spares.php?id=$referencia> ✏️ </a></center></td>
                    <td>$referencia</td>
                    <td>$descripcion</td>
                    <td>$importe</td>
                    <td>$ganancia</td>
                    </tr>";
                
                }
            ?>
        </table>
        <br>
        <input type="submit" value="Eliminar Repuestos Seleccionadas">
        <input type="reset" value="Deseleccionar Todos">
        <p><a href="introduce_spares.php">Agregar repuesto</a></p>
    </form>
</body>
</html>
