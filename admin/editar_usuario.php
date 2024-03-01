<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

// Verificar si se recibió un ID válido
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Obtener información del usuario a editar
    $sql = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
    $sql->execute([$id_usuario]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "Usuario no encontrado.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar la actualización del usuario
    $id_usuario = $_POST['id'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $activacion = $_POST['activacion'];
    $id_cliente = $_POST['id_cliente'];

    try {
        // Actualizar la información del usuario
        $sql = $con->prepare("UPDATE usuarios SET usuario = ?, password = ?, activacion = ?, id_cliente = ? WHERE id = ?");
        $sql->execute([$usuario, $password, $activacion, $id_cliente, $id_usuario]);

        // Verificar si se realizó la actualización correctamente
        if ($sql->rowCount() > 0) {
            echo "Usuario actualizado exitosamente.";
            header('Location:usuario.php');
        } else {
            echo "Error: No se pudo actualizar el usuario.";
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
    <title>Editar Usuario</title>
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
        <h1>Editar Usuario</h1>
        <form action="editar_usuario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" value="<?php echo $usuario['password']; ?>" required><br>

            <label for="activacion">Activación:</label>
            <input type="text" name="activacion" value="<?php echo $usuario['activacion']; ?>" required><br>

            <label for="id_cliente">ID Cliente:</label>
            <input type="number" name="id_cliente" value="<?php echo $usuario['id_cliente']; ?>" required><br>

            <input type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
