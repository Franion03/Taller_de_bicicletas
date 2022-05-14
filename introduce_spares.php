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

    <form action="insert_spares.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td> Descripcion: </td>
                <td><input type="text" name="descripcion"><br></td>
            </tr>
            <tr>
                <td>Importe: </td>
                <td><input type="text" name="importe"><br></td>
            </tr>
            <tr>
                <td>Ganancia: </td>
                <td><input type="text" name="ganancia"><br></td>
            </tr>       
        </table>
        <input type="submit" value="Introducir Repuesto">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>