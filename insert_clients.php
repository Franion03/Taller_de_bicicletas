<?php
    session_start();
    if($_SESSION["autentificado"]!=1)
        header("Location: login.html")
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
        $dni=$_POST["dni"];
        $nombre=$_POST["nombre"];
        $apellido1=$_POST["apellido1"];
        $apellido2=$_POST["apellido2"];
        $direccion=$_POST["direccion"];
        $cp=$_POST["cp"];
        $poblacion=$_POST["poblacion"];
        $provincia=$_POST["provincia"];
        $telefono=$_POST["telefono"];
        $email=$_POST["email"];
        
        if (is_uploaded_file($_FILES['foto']['tmp_name']))
        {
            $foto=$_FILES['foto']['tmp_name'];

            $fotografia=imagecreatefromjpeg($foto);
            ob_start();
            imagejpeg($fotografia);
            $jpg=ob_get_contents();
            ob_end_clean();
            $intermedio = addslashes(trim($jpg));
            $jpg = str_replace('##','\##', $intermedio);
        }

        $sentenciaSQL=("insert into clientes(DNI, Nombre, Apellido1, Apellido2, Direccion, Cp, Poblacion, Provincia, Telefono, Email, Fotografia) values ('$dni','$nombre','$apellido1','$apellido2','$direccion','$cp','$poblacion','$provincia','$telefono','$email','$jpg')");
        
        $result=$conexion->query($sentenciaSQL);
        if(!$result) {
            echo "<br>Error al introducir el Cliente en la Base de Datos";
        }
        else{
            echo "<br>El Cliente se ha introducido con exito en la base de Datos";
        }
    ?>
</body>
</html>