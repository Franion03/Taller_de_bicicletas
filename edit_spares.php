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
    <h1>Menu inicial</h1>
    <a href="lista_clientes.php">Lista de clientes</a>
    <a href="lista_embarcaciones.php">Lista de embarcaciones</a>
    <a href="lista_repuestos.php">Lista de repuestos</a>
    <a href="lista_facturas.php">Lista de facturas</a>
    <a href="cerrar_sesion.php">Cerrar Session</a> <br> <br>

        <?php
            include("conexion.php");
            include("delete_temporals.php");
            $id=$_GET["id"];
            $sentenciaSQL="SELECT * FROM repuestos where Referencia='$id'";
            
            
            $result = $conn->query($sentenciaSQL);
            $rows= $result->fetchAll();

            foreach ($rows as $row){
                $referencia=$row['Referencia'];
                $descripcion=$row['Descripcion'];
                $importe=$row['Importe'];
                $ganancia=$row['Ganancia'];
                
                echo "    <form action=update_spares.php method=POST enctype=multipart/form-data>
                <table>
                <tr>
                    <td> Referencia: </td>
                    <td><input type=text name=referencia value=$referencia readonly><br></td>
                </tr>
                    <tr>
                        <td> Descripcion: </td>
                        <td><input type=text name=descripcion  value=$descripcion><br></td>
                    </tr>
                    <tr>
                        <td>Importe: </td>
                        <td><input type=text name=importe value=$importe><br></td>
                    </tr>
                    <tr>
                        <td>Ganancia: </td>
                        <td><input type=text name=ganancia value=$ganancia><br></td>
                    </tr>       
                </table>
                <input type=submit value=Actualizar>";
            
            }
        ?>

        
    </form>
</body>
</html>