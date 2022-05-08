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
        if (isset($_REQUEST['btnAceptar'])) { 
            if($_SESSION["autentificado"]!= "SI"){
                header("Location: index.php?errorusuerio=si");
            }
                session_start();
                $_SESSION['name']=$_REQUEST['name'];
                $_SESSION['password']="";
        }
    ?> 
    <form action="procesar.php" method="post"> 
        Entrar:
        <input placeholder="Usuario" type="text" name="name">
        <br/>
        <input placeholder="Contraseña" type="password" name="password">
        <br/>
        <input type="submit" name="btnAceptar" value="Aceptar">
    </form>
    
</body>
</html>