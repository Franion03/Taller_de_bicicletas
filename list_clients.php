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


    <form action="delete_clients.php" method="POST">
        <table>
            <tr>
                <td>Eliminar</td>
                <td>Detalles/Editar</td>
                <td>ID</td>
                <td>DNI</td>
                <td>Nombre</td>
                <td>Apellido 1</td>
                <td>Apellido 2</td>
                <td>Direccion</td>
                <td>CP</td>
                <td>Ciudad</td>
                <td>Provincia</td>
                <td>Telefono</td>
                <td>Email</td>
                <td>Imagen</td>
            </tr>
            <?php
                include("conexion.php");
                include("delete_temporals.php");
                $sql="SELECT * FROM clientes order by Id_Cliente";

                $result = $conn->query($sql);
                $rows= $result->fetchAll();

                foreach ($rows as $row){
                    $id_cliente=$row['Id_Cliente'];
                    $dni=$row['DNI'];
                    $nombre=$row['Nombre'];
                    $apellido1=$row['Apellido1'];
                    $apellido2=$row['Apellido2'];
                    $direccion=$row['Direccion'];
                    $cp=$row['CP'];
                    $poblacion=$row['Poblacion'];
                    $provincia=$row['Provincia'];
                    $telefono=$row['Telefono'];
                    $email=$row['Email'];
                    $fotografia=$row['Fotografia'];

                    $imagen=basename(tempnam(getcwd()."/temporales","temp"));
                    $imagen.=".jpg";
                    
                    $fichero=fopen("./temporales/".$imagen,"w");
                    fwrite($fichero,$fotografia);
                    fclose($fichero);

                    
                    echo "<tr>
                    <td><center><input type=checkbox name=borrar[] value=$id_cliente></center></td>
                    <td><center><a href=edit_clients.php?id=$id_cliente> ✏️ </a></center></td>
                    <td><center><b>$id_cliente</b></center></td>
                    <td>$dni</td>
                    <td>$nombre</td>
                    <td>$apellido1</td>
                    <td>$apellido2</td>
                    <td>$direccion</td>
                    <td>$cp</td>
                    <td>$poblacion</td>
                    <td>$provincia</td>
                    <td>$telefono</td>
                    <td>$email</td>
                    <td><center><a href=temporales/$imagen><img src=temporales/$imagen width=50 border=0></a></center></td>
                    </tr>";
                
                }
            ?>
        </table>
        <br>
        <input type="submit" value="Eliminar Clientes Seleccionados">
        <input type="reset" value="Deseleccionar Todos">
        <p><a href="introduce_clients.php">Agregar cliente</a></p>
    </form>
</body>
</html>