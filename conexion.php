<?php
    $conn = null;
    $host = 'localhost';
    $db = 'taller_motocicletas';
    $user = 'root';
    $pwd = '';
    try {
        $conn=new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        echo 'Conectado con éxito <br/>';
    }
    catch (PDOException $e) {
        echo '<p>No se puede conectar con la base de datos !!</p>';
    exit;
    }
    return $conn;
?>