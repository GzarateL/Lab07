<?php
// Datos de conexión a la base de datos (XAMPP)
$host = 'localhost';
$dbname = 'agentes_secretos'; // Nombre de tu base de datos
$username = 'root'; // Usuario de MySQL por defecto en XAMPP
$password = ''; // Contraseña vacía por defecto en XAMPP

// Intentar conectar a la base de datos
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 5px;'>Error de conexión a la base de datos: " . $e->getMessage() . "</div>");
}
?>
