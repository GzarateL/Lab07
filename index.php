<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Datos de Agente Secreto</title>
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
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ingreso de Datos de Agente Secreto</h2>
        <form method="post" action="process.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="agente_id">Agente ID:</label>
            <input type="text" id="agente_id" name="agente_id" required>
            <label for="departamento_id">Departamento ID:</label>
            <input type="text" id="departamento_id" name="departamento_id" required>
            <label for="num_misiones">Número de Misiones:</label>
            <input type="number" id="num_misiones" name="num_misiones" required>
            <label for="descripcion_mision">Descripción de la Nueva Misión:</label>
            <textarea id="descripcion_mision" name="descripcion_mision" required></textarea>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
