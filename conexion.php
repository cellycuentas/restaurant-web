<?php
$host = "localhost";
$baseDatos = "base_datos";
$usuario = "root";
$contrasena = "root"; 

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4",
        $usuario,
        $contrasena,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    exit("Error de conexión. Comprueba que MySQL esté iniciado y que hayas importado base_datos.sql.");
}
?>
