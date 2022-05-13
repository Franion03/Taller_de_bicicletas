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
        $id=$_POST["id"];
        

        $sentenciaSQL=("UPDATE clientes
        set DNI='$dni',
        Nombre = '$nombre',
        Apellido1='$apellido1',
        Apellido2='$apellido2',
        Direccion='$direccion',
        CP='$cp',
        Poblacion='$poblacion',
        Provincia='$provincia',
        Telefono='$telefono',
        Email='$email'
        where Id_Cliente='$id'");
        
        $result=$conn->query($sentenciaSQL);
        if(!$result) {
            echo "<br>Error al actualizar el Cliente en la Base de Datos";
        }
        else{
            echo "<br>El Cliente se ha actualizado con exito en la base de Datos";
        }
    ?>
</body>
</html>