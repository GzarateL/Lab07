<?php
// Incluir archivo de conexión a la base de datos
include 'db_connection.php';

// Recuperar los datos del último agente secreto ingresado desde la base de datos
try {
    $stmt = $pdo->query("SELECT * FROM agentes_secretos ORDER BY id DESC LIMIT 1");
    $agente_secreto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Decrypt sensitive data
    function decryptData($data) {
        // Clave de cifrado (asegúrate de cambiar esto por la misma clave utilizada para cifrar)
        $key = 'tu_clave_de_cifrado_aqui';
        // Decodificar la cadena base64
        $data = base64_decode($data);
        // Separar el texto cifrado del vector de inicialización
        list($encrypted_data, $iv) = explode('::', $data);
        // Descifrar los datos utilizando AES-256-CBC
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
    }

    // Decrypt encrypted data
    $nombre = decryptData($agente_secreto['nombre_encrypted']);
    $agente_id = decryptData($agente_secreto['agente_id_encrypted']);
    $departamento_id = decryptData($agente_secreto['departamento_id_encrypted']);
} catch (PDOException $e) {
    die("<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 5px;'>Error al obtener los datos del agente secreto: " . $e->getMessage() . "</div>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Datos de Agente Secreto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
            margin-top: 0;
        }
        p {
            margin-bottom: 10px;
        }
        .error {
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirmación de Datos de Agente Secreto</h2>
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>Agente ID:</strong> <?php echo $agente_id; ?></p>
        <p><strong>Departamento ID:</strong> <?php echo $departamento_id; ?></p>
        <p><strong>Número de Misiones:</strong> <?php echo $agente_secreto['num_misiones']; ?></p>
        <p><strong>Descripción de la Nueva Misión:</strong> <?php echo $agente_secreto['descripcion_mision']; ?></p>
    </div>
</body>
</html>