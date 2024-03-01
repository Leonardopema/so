<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './config/database.php';

$db = new Database();
$con = $db->conectar();

// Función para obtener todos los detalles de compra
function obtenerDetallesCompra() {
    global $con;
    $detallesCompra = array();

    $sql = $con->query("SELECT * FROM detalle_compra");

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $detallesCompra[] = $row;
    }

    return $detallesCompra;
}

// Obtener detalles de compra
$detallesCompra = obtenerDetallesCompra();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Detalles de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
            body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h1 {
            color: #007bff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 50px; /* Ajuste aquí */
        }

        .add-product-link {
            display: block;
            margin-top: 20px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>


<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Tienda Online Trajes</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="inicio.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Productos
                        </a>
                        <a class="nav-link collapsed" href="usuario.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Usuarios
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <a class="nav-link" href="historial.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Historial
                        </a>
                    </div>
                </div>
            </nav>
        </div>

<div class="container">
    <h2 class="mt-3">Detalles de Compra</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Compra</th>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detallesCompra as $detalle): ?>
                <tr>
                    <td><?= $detalle['id']; ?></td>
                    <td><?= $detalle['id_compra']; ?></td>
                    <td><?= $detalle['id_producto']; ?></td>
                    <td><?= $detalle['nombre']; ?></td>
                    <td><?= $detalle['precio']; ?></td>
                    <td><?= $detalle['cantidad']; ?></td>
                    <td>
                        <a href="editar_detalle.php?id=<?= $detalle['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar_detalle.php?id=<?= $detalle['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
