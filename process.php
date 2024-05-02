<?php
// Incluir archivo de conexión a la base de datos
include 'db_connection.php';

// Definir una constante para la clave de cifrado
define('CLAVE_DE_CIFRADO', 'casa123negra');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data
    $nombre = validateInput($_POST['nombre']);
    $agente_id = validateInput($_POST['agente_id']);
    $departamento_id = validateInput($_POST['departamento_id']);
    $num_misiones = validateInput($_POST['num_misiones']);
    $descripcion_mision = validateInput($_POST['descripcion_mision']);

    // Encrypt sensitive data
    $nombre_encrypted = encryptData($nombre);
    $agente_id_encrypted = encryptData($agente_id);
    $departamento_id_encrypted = encryptData($departamento_id);

    // Insert data into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO agentes_secretos (nombre_encrypted, agente_id_encrypted, departamento_id_encrypted, num_misiones, descripcion_mision) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre_encrypted, $agente_id_encrypted, $departamento_id_encrypted, $num_misiones, $descripcion_mision]);
        // Redirect to the confirmation page
        header("Location: confirmation.php");
        exit();
    } catch (PDOException $e) {
        die("<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 5px;'>Error al insertar datos en la base de datos: " . $e->getMessage() . "</div>");
    }
}

// Function to validate user input
function validateInput($data) {
    // Remove leading and trailing whitespaces
    $data = trim($data);
    // Convert special characters to HTML entities to prevent XSS attacks
    $data = htmlspecialchars($data);
    return $data;
}

// Función para cifrar datos
function encryptData($data) {
    return openssl_encrypt($data, 'aes-256-cbc', CLAVE_DE_CIFRADO, 0, substr(CLAVE_DE_CIFRADO, 0, 16));
}
?>

