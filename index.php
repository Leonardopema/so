<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAJES TIPICOS</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="css/estilo.css">


</head>

<body>

<header class="header">
  <div class="child-header">
    <div class="box-logo">
    <a class="navbar-brand"><img src="img/logo.png" width="130px"></a>
    </div>
    
    <nav class="box-menu-navegacion" id="menu-navegacion">
      <ul class="menu-navegacion">
        <li class="item-menu">
          <a href="index.php" class="item-menu-link">Inicio</a>
        </li>
        <li class="item-menu">
          <a href="Conocenos.php" class="item-menu-link">Conocenos</a>
        </li>
        
        <li class="item-menu item-menu-sub-menu">
          <a href="javascript:void(0);" class="item-menu-link" onclick="verificarSesion()">Catalogo</a>
        
          <i class="fas fa-angle-down angle-view-sub-menu"></i>
        </li>
        
        <li class="item-menu item-menu-sub-menu">
          <a href="#" class="item-menu-link">Mas..</a>
          <i class="fas fa-angle-down angle-view-sub-menu"></i>
          
          <ul class="sub-menu" id="sub-menu">
            <li class="item-menu">
              <a href="Contacto.php" class="item-menu-link">Contacto</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
<!-- En tu barra de navegación o en algún lugar visible para el usuario -->
<form class="d-flex">
  <?php if (isset($_SESSION['user'])) : ?>
    <button type="button" class="btn btn-success" onclick="window.location.href = 'logout.php';">
      <img src="img/usuario.jpg" width="50px"> Cerrar Sesión
    </button>
  <?php else : ?>
    <button type="button" class="btn btn-success" onclick="window.location.href = 'login.php';">
      <img src="img/usuario.jpg" width="50px"> Iniciar Sesión
    </button>
  <?php endif; ?>
</form>

    
 
    <button class="btn-hamburguesa" id="btn-hamburguesa">
      <span></span>
      <span></span>
      <span></span>
    </button>
 
  </div>

</header>
 
<script>
let btnHamburguesa = document.getElementById("btn-hamburguesa");
let menuNavegacion = document.getElementById("menu-navegacion");
btnHamburguesa.addEventListener('click', function(){
    menuNavegacion.classList.toggle("viewMenu");
});

$(".angle-view-sub-menu").click(function(){
  $(this).siblings("ul").toggle();
})
</script>
    



<div id="mostrarSlider">
        <div class="Slider-banner">
            <h1>"Viste la belleza de Chiapas, sin salir de casa."</h1> 
        </div>
</div>
</header>

<section class="mt-5">
  <div class="container espacio-superior">
    <div class="row">
      <div class="col-md-6">
        <img src="img/1img.jpg" class="img-fluid centrar" alt="Imagen 1">
      </div>
      <div class="col-md-5 text-justify d-flex align-items-center justify-content-center">
        <div>
          <h4 style="color: #800000; text-align: center;">¡Bienvenido a nuestra tienda de trajes típicos!</h4>
          <p style="margin: 50px;">En nuestro rincón virtual, te invitamos a explorar la riqueza y la diversidad de las vestimentas de todo Chiapas.</p>
        </div>
      </div>
    </div>
  </div>
</section><br><br>
<footer class="bg-dark text-light text-center py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; 2023 Trajes. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>



    <script>
  function verificarSesion() {
    <?php if (!isset($_SESSION['user_name'])) : ?>
      alert('Debes iniciar sesión para acceder al catálogo.');
      window.location.href = 'login.php';
    <?php else : ?>
      // Aquí puedes redirigir al catálogo si es necesario
      // window.location.href = 'catalogo.php';
    <?php endif; ?>
  }
</script>


<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Incluye la biblioteca de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">





</body>



</html>