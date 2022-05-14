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
</head>
<body>

        <?php
            include("conexion.php");
            $id=$_GET["id"];
            $sentenciaSQL="SELECT * FROM motocicletas where Matricula='$id'";
            
            
            $result = $conn->query($sentenciaSQL);
            $rows= $result->fetchAll();

            foreach ($rows as $row){
                $matricula=$row['Matricula'];
                $marca=$row['Marca'];
                $modelo=$row['Modelo'];
                $año=$row['Anyo'];
                $color=$row['Color'];
                $id_cliente=$row['Id_Cliente'];
                
                echo "    <form action=update_motorbikes.php method=POST enctype=multipart/form-data>
                <table>
                    <tr>
                        <td> Matricula: </td>
                        <td><input type=text name=matricula value=$matricula><br></td>
                    </tr>
                    <tr>
                        <td>Modelo: </td>
                        <td><input type=text name=modelo value=$modelo><br></td>
                    </tr>
                    <tr>
                        <td>Marca: </td>
                        <td><input type=text name=marca value=$marca><br></td>
                    </tr>
                    <tr>
                        <td>Año: </td>
                        <td><input type=text name=año value=$año><br></td>
                    </tr>
                    <tr>
                        <td>Color: </td>
                        <td><input type=text name=color value=$color><br></td>
                    </tr>
                    <tr>
                        <td>Dni Cliente: </td>
                        <td>
                            <select name=id_cliente>";

                                    include("conexion.php");
                                    $sql="SELECT DNI, Id_Cliente FROM clientes";
        
                                    $result = $conn->query($sql);
                                    $rows= $result->fetchAll();
        
                                    foreach($rows as $row)
                                    {
                                        $dni=$row['DNI'];
                                        $id=$row['Id_Cliente'];
                                        
                                        if ($id==$id_cliente)
                                            echo "<option value=$id selected>$dni</option>";
                                        else
                                            echo "<option value=$id>$dni</option>";
                                    }
                    echo "</select><br>
                        </td>
                    </tr>       
                </table>
                <input type=submit value=Actualizar>";
            
            }
        ?>

        
    </form>
</body>
</html>