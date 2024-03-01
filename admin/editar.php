<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Obtener información del producto a editar
    $sql = $con->prepare("SELECT * FROM productos WHERE id = ?");
    $sql->execute([$id_producto]);
    $producto = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        echo "Producto no encontrado.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar la actualización del producto
    $id_producto = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $id_categoria = $_POST['id_categoria'];
    $activo = isset($_POST['activo']) ? $_POST['activo'] : 1; // Valor predeterminado de 1 si no se proporciona

    try {
        // Actualizar la información del producto
        $sql = $con->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, descuento = ?, id_categoria = ?, activo = ? WHERE id = ?");
        $sql->execute([$nombre, $descripcion, $precio, $descuento, $id_categoria, $activo, $id_producto]);

        // Verificar si se realizó la actualización correctamente
        if ($sql->rowCount() > 0) {
            echo "Producto actualizado exitosamente.";
            header ('Location:inicio.php');
        } else {
            echo "Error: No se pudo actualizar el producto.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}

// Código para mostrar la lista de productos aquí...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h2 {
            color: #007bff;
        }

        form {
            max-width: 400px;
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
    </style>
</head>
<body>
<h2>Editar Producto</h2>
<form action="editar.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" value="<?php echo $producto['precio']; ?>" required><br>

    <label for="descuento">Descuento:</label>
    <input type="number" name="descuento" value="<?php echo $producto['descuento']; ?>"><br>

    <label for="id_categoria">Id Categoria:</label>
    <input type="number" name="id_categoria" value="<?php echo $producto['id_categoria']; ?>"><br>

    <label for="activo">Activo:</label>
    <input type="number" name="activo" value="<?php echo $producto['activo']; ?>"><br>

    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    <input type="submit" value="Guardar Cambios">
</form>

</body>
</html>