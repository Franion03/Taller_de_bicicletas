<?php
    
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];

    if (true) { 
        session_start();
        $_SESSION['name']=$_REQUEST['name'];
        $_SESSION['password']="";
        $_SESSION["autentificado"]="SI";
        header("Location: access_data.php");
    }
?> 