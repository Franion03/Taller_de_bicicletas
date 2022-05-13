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

    <form action="insert_clients.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>DNI: </td>
                <td><input type="text" name="dni"><br></td>
            </tr>
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
                <td>Direccion: </td>
                <td><input type="text" name="direccion"><br></td>
            </tr>
            <tr>
                <td>C.P.: </td>
                <td><input type="text" name="cp"><br></td>
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
            <tr>
                <td>E-Mail: </td>
                <td><input type="text" name="email"><br></td>
            </tr>
            <tr>
                <td>Fotografia: </td>
                <td><input type="file" name="foto"><br></td>
            </tr>
        </table>

        
        
        
        
        
        <input type="submit" value="Introducir Cliente">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>