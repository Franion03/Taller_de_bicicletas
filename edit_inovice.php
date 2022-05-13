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
    <title>Franion Quiles</title>
</head>
<body>

        <?php
            include("conexion.php");
            $id=$_GET["id"];
            $sentenciaSQL="SELECT * FROM facturas where Numero_Factura='$id'";
            
            
            $result = $conn->query($sentenciaSQL);
            $rows= $result->fetchAll();

            foreach ($rows as $row){

                $numero_factura=$row['Numero_Factura'];
                $matricula=$row['Matricula'];
                $mano_de_obra=$row['Mano_Obra'];
                $precio_hora=$row['Precio_Hora'];
                $fecha_emision=$row['Fecha_Emision'];
                $fecha_pago=$row['Fecha_Pago'];
                $base_imponible=$row['Base_Imponible'];
                $iva=$row['IVA'];
                $total=$row['Total'];
                
                echo "    <form action=update_inovices.php method=POST enctype=multipart/form-data>
                <table>
                    <tr>
                        <td>Numero de factura: </td>
                        <td><input type=text name=numero_factura readonly value=$id><br></td>
                    </tr>
                    <tr>
                        <td> Matricula: </td>
                        <td>
                            <select name=matricula >";
                                
                                        $sql="SELECT Matricula FROM motocicletas";
        
                                        $result = $conn->query($sql);
                                        $rows= $result->fetchAll();
        
                                        foreach($rows as $row)
                                        {
                                            $mat=$row['Matricula'];
                                            
                                            if ($mat==$matricula)
                                                echo "<option value=$mat selected>$mat</option>";
                                            else
                                                echo "<option value=$mat>$mat</option>";
                                        }
                                    
                            echo "</select><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Mano de obra: </td>
                        <td><input type=text name=mano_de_obra value=$mano_de_obra><br></td>
                    </tr>
                    <tr>
                        <td>Precio por hora: </td>
                        <td><input type=text name=precio_hora value=$precio_hora><br></td>
                    </tr>
                    <tr>
                        <td>Fecha de emision: </td>
                        <td><input type=text name=fecha_emision placeholder=YYYY-MM-DD  value=$fecha_emision><br></td>
                    </tr>
                    <tr>
                        <td>Fecha de pago: </td>
                        <td><input type=text name=fecha_pago placeholder=YYYY-MM-DD value=$fecha_pago><br></td>
                    </tr>
                    <tr>
                        <td>IVA: </td>
                        <td><input type=text name=iva value=$iva><br></td>
                    </tr>
                    
                    <tr>
                        <td>Repuesto: </td>
                        <td>
                            <select name=referencia >";
                }
                $sentenciaSQL="SELECT * FROM detalle_factura where Numero_Factura='$id'";
                $result = $conn->query($sentenciaSQL);
                $rows= $result->fetchAll();

                foreach ($rows as $row){
                    $referencia=$row['Referencia'];
                    $unidades=$row['Unidades'];
                    

                    $sql="SELECT Referencia, Descripcion FROM repuestos";

                    $result = $conn->query($sql);
                    $rows= $result->fetchAll();

                    foreach($rows as $row)
                    {
                        $desc=$row['Descripcion'];
                        $ref=$row['Referencia'];
                        
                        if ($ref==$referencia)
                            echo "<option value=$ref selected>$desc</option>";
                        else
                            echo "<option value=$ref>$desc</option>";
                    }
                                
                    echo "</select><br>
                        </td>
                    </tr>
                    <tr>
                        <td> Unidades: </td>
                        <td><input type=text name=unidades value=$unidades><br></td>
                    </tr>
                    
                </table>
                <input type=submit value=Actualizar>";

                }
        ?>

        
    </form>
</body>
</html>