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
        $matricula=$_POST['matricula'];
        $modelo=$_POST['modelo'];
        $marca=$_POST['marca'];
        $año=$_POST['año'];
        $color=$_POST['color'];
        $id_cliente=$_POST['id_cliente'];
        

        $sentenciaSQL=("insert into motocicletas(Matricula, Marca, Modelo, Anyo, Color, Id_Cliente) values ('$matricula', '$marca', '$modelo', '$año', '$color', '$id_cliente')");
        
        $result=$conn->query($sentenciaSQL);
        if(!$result) {
            echo "<br>Error al introducir la moticicleta en la Base de Datos";
        }
        else{
            echo "<br>La motocicleta se ha introducido con exito en la base de Datos";
        }
    ?>
</body>
</html>