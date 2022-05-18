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
    <form action="show_filter_inovices.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Dni Cliente: </td>
                <td>
                    <select name="id_cliente" >
                        <?php
                            include("conexion.php");
                            include("eliminar_temporales.php");
                            $sql="SELECT DNI, Id_Cliente FROM clientes";

                            $result = $conn->query($sql);
                            $rows= $result->fetchAll();

                            foreach($rows as $row)
                            {
                                $dni=$row['DNI'];
                                $id=$row['Id_Cliente'];

                                echo "<option value=$id>$dni</option>";
                            }
                        ?>
                    </select><br>
                </td>
            </tr>  
            <tr>
                <td>Fecha inicio</td>
                <td>
                <input type="date" id="start" name="start"
                        value="2021-06-6"
                        min="2000-01-01" max="2030-12-31">
                </td>
            </tr>
            <tr>
                <td>Fecha fin</td>
                <td>
                <input type="date" id="end" name="end"
                        value="2021-06-6"
                        min="2000-01-01" max="2030-12-31">
                </td>
            </tr>
        </table>

        
        
        
        
        
        <input type="submit" value="Buscar facturas">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>