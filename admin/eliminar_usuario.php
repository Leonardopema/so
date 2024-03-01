<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Obtener información del producto a eliminar
    $sql = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
    $sql->execute([$id_usuario]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "Producto no encontrado.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Procesar la eliminación del producto
    $id_usuario = $_POST['id'];

    try {
        // Eliminar el producto
        $sql = $con->prepare("DELETE FROM usuarios WHERE id = ?");
        $sql->execute([$id_usuario]);

        // Verificar si se realizó la eliminación correctamente
        if ($sql->rowCount() > 0) {
            echo "Usuario eliminado exitosamente.";
            header('Location: usuario.php');
        } else {
            echo "Error: No se pudo eliminar el producto.";
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
    <title>Eliminar Usuario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .confirmation-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #dc3545;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>Eliminar Usuario</h2>
        <p>¿Estás seguro de que deseas eliminar el Usuario con el siguiente detalle?</p>
        <ul>
            <li>Usuario: <?php echo $usuario['usuario']; ?></li>
            <li>password: <?php echo $usuario['password']; ?></li>
            <li>Activacion: <?php echo $usuario['activacion']; ?></li>
            <li>id_cliente: <?php echo $usuario['id_cliente']; ?></li>
        </ul>
        <form action="eliminar_usuario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            <input type="submit" value="Confirmar Eliminación">
        </form>
    </div>
</body>
</html>
