<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $id_categoria = $_POST['id_categoria'];
    $activo = isset($_POST['activo']) ? $_POST['activo'] : 1; // Valor predeterminado de 1 si no se proporciona

    try {
        $sql = $con->prepare("INSERT INTO productos (nombre, descripcion, precio, descuento, id_categoria, activo) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute([$nombre, $descripcion, $precio, $descuento, $id_categoria, $activo]);

        // Verificar si se realizó la inserción correctamente
        if ($sql->rowCount() > 0) {
            echo "Producto guardado exitosamente.";
            header("Location: inicio.php");
        } else {
            echo "Error: No se pudo guardar el producto.";
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
    <title>Agregar Producto</title>
    <style>
                body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h2 {
            color: #007bff;
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h2>Formulario de Producto</h2>
    <form action="formulario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" required><br>

        <label for="descuento">Descuento:</label>
        <input type="number" name="descuento"><br>

        <label for="id_categoria">Id Categoria:</label>
        <input type="number" name="id_categoria"><br>

        <label for="activo">Activo:</label>
        <input type="number" name="activo" value="1"><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
