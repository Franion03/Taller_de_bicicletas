<?php
    function dbConnect(){
        $conn = null;
        $host = 'localhost';
        $db = 'embarcaciones';
        $user = 'root';
        $pwd = '';
        try {
            $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user,$pwd);
            echo 'Conectado con éxito <br/>';
        }
        catch (PDOException $e) {
            echo '<p>No se puede conectar con la base de datos !!</p>';
        exit;
        }
        return $conn;
    }
    $conn = dbConnect();
?>