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
    <form action="show_filter_clients.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nombre: </td>
                <td><input type="text" name="nombre"><br></td>
            </tr>
            <tr>
                <td>Primer Apellido: </td>
                <td><input type="text" name="apellido1"><br></td>
            </tr>
            <tr>
                <td>Segundo Apellido: </td>
                <td><input type="text" name="apellido2"><br></td>
            </tr>
            <tr>
                <td>Poblacion: </td>
                <td><input type="text" name="poblacion"><br></td>
            </tr>
            <tr>
                <td>Provincia: </td>
                <td><input type="text" name="provincia"><br></td>
            </tr>
            <tr>
                <td>Telefono: </td>
                <td><input type="text" name="telefono"><br></td>
            </tr>
        </table>

        
        
        
        
        
        <input type="submit" value="Buscar Clientes">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>