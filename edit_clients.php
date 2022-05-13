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

    <form action="update_clients.php" method="POST" enctype="multipart/form-data">
        <?php
            include("conexion.php");
            include("delete_temporals.php");
            $id=$_GET["id"];
            $sentenciaSQL="SELECT * FROM clientes where Id_Cliente='$id'";
            
            
            $result = $conn->query($sentenciaSQL);
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
                
                echo "<table>
                <tr>
                    <td>ID: </td>
                    <td><input type=text name=id readonly value=$id_cliente><br></td>
                </tr>
                <tr>
                    <td>DNI: </td>
                    <td><input type=text name=dni value=$dni><br></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type=text name=nombre value=$nombre><br></td>
                </tr>
                <tr>
                    <td>Primer Apellido: </td>
                    <td><input type=text name=apellido1 value=$apellido1><br></td>
                </tr>
                <tr>
                    <td>Segundo Apellido: </td>
                    <td><input type=text name=apellido2 value=$apellido2><br></td>
                </tr>
                <tr>
                    <td>Direccion: </td>
                    <td><input type=text name=direccion value=$direccion><br></td>
                </tr>
                <tr>
                    <td>C.P.: </td>
                    <td><input type=text name=cp value=$cp><br></td>
                </tr>
                <tr>
                    <td>Poblacion: </td>
                    <td><input type=text name=poblacion  value=$poblacion><br></td>
                </tr>
                <tr>
                    <td>Provincia: </td>
                    <td><input type=text name=provincia value=$provincia><br></td>
                </tr>
                <tr>
                    <td>Telefono: </td>
                    <td><input type=text name=telefono value=$telefono><br></td>
                </tr>
                <tr>
                    <td>E-Mail: </td>
                    <td><input type=text name=email value=$email><br></td>
                </tr>
            </table>
            <input type=submit value=Actualizar Cliente>";
            
            }
        ?>

        
    </form>
</body>
</html>