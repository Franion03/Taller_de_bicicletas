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
    <a href="cerrar_sesion.php">Cerrar Session</a> <br><br>

    <?php
        include("conexion.php");
        $matricula=$_POST['matricula'];
        $marca=$_POST['marca'];
        $modelo=$_POST['modelo'];
        $año=$_POST['año'];
        $color=$_POST['color'];
        $id_cliente=$_POST['id_cliente'];
        

        $sentenciaSQL=("UPDATE motocicletas
        set Matricula='$matricula',
        marca='$marca',
        modelo='$modelo',
        Anyo='$año',
        Color='$color',
        Id_Cliente='$id_cliente'
        where Matricula='$matricula'");
        
        $result=$conn->query($sentenciaSQL);
        if(!$result) {
            echo "<br>Error al actualizar la embarcacion en la Base de Datos";
        }
        else{
            echo "<br>La embarcacion se ha actualizado con exito en la base de Datos";
        }
    ?>
</body>
</html>