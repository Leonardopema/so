<?php
require 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $activacion = $_POST['activacion'];
    $token=$_POST['token'];
    $token_password=$_POST['token_password'];
    $password_request=$_POST['password_request'];
    $id_cliente = $_POST['id_cliente'];

    // Crear instancia de la clase Database y conectar a la base de datos
    $db = new Database();
    $con = $db->conectar();

    try {
        // Insertar nuevo usuario en la base de datos
        $sql = $con->prepare("INSERT INTO usuarios (usuario, password, activacion,token,token_password,password_request, id_cliente) VALUES (?, ?, ?, ?,?,?,?)");
        $sql->execute([$usuario, $password, $activacion,$token,$token_password, $password_request, $id_cliente]);

        // Verificar si se realizó la inserción correctamente
        if ($sql->rowCount() > 0) {
            echo "Usuario agregado exitosamente.";
            header('Location:usuario.php');
        } else {
            echo "Error: No se pudo agregar el usuario.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Usuario</h1>
        <form action="agregar_usuario.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <label for="activacion">Activación:</label>
            <input type="text" name="activacion" required>

            <label for="token">Token:</label>
            <input type="text" name="token" required>

            <label for="token_pasword">token_pasword:</label>
            <input type="text" name="token_pasword" required>

            <label for="password_request">pasword_request:</label>
            <input type="text" name="password_request" required>



            <label for="id_cliente">ID Cliente:</label>
            <input type="number" name="id_cliente" required>

            <input type="submit" value="Agregar Usuario">
        </form>
    </div>
</body>
</html>
