<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

// Obtener todos los productos
$sql = $con->prepare("SELECT * FROM productos");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
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
                    <li><a class="dropdown-item" href="">Logout</a></li>
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
                        <a class="nav-link" href="usuario.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Usuarios
                        </a>
                        <a class="nav-link" href="historial.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Historial
                        </a>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Lista de Productos</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Agregar, Editar y Eliminar Productos</li>
                    </ol>

                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Acciones</th>
                        </tr>

                        <?php
                        // Mostrar productos en la tabla
                        if ($sql->rowCount() > 0) {
                            foreach ($result as $row) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['nombre']}</td>
                                        <td>{$row['descripcion']}</td>
                                        <td>{$row['precio']}</td>
                                        <td>{$row['descuento']}</td>
                                        <td>
                                            <a href='editar.php?id={$row['id']}'>Editar</a> |
                                            <a href='eliminar.php?id={$row['id']}'>Eliminar</a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No hay productos disponibles</td></tr>";
                        }
                        ?>
                    </table>

                    <a href="formulario.php" class="add-product-link">Agregar nuevo producto</a>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
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
