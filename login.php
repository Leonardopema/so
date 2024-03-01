<?php
require './config/config.php';
require './config/database.php';
require './clases/clienteFunciones.php';
$db = new Database();
$con = $db->conectar();

$errors = [];

if(!empty($_POST)){


  $usuario = trim( $_POST['usuario']);
  $password = trim( $_POST['password']);
  
  
  if(esNulo([ $usuario, $password])){
    $errors[]= "Debe llenar todos los campos";
  }
   if(count($errors)==0){
  $errors[] = login($usuario,$password,$con);
   }


}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body class="body">
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
          
          <ul class="sub-menu" id="sub-menu">
            <li class="item-menu">
              <a href="#" class="item-menu-link"></a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link"></a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link"></a>
            </li>
          </ul>
        </li>
        
        <li class="item-menu item-menu-sub-menu">
          <a href="#" class="item-menu-link">Mas..</a>
          <i class="fas fa-angle-down angle-view-sub-menu"></i>
          
          <ul class="sub-menu" id="sub-menu">
            <li class="item-menu">
              <a href="Contacto.php" class="item-menu-link">Contacto</a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link"></a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link"></a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link"></a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link"></a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <form class="d-flex">
                <button type="button" class="btn btn-success" onclick="window.location.href = 'login.php';"><img src="img/usuario.jpg" width="50px"> Iniciar Sesión</button>
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
     
<main>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-7 col-lg-6 col-xl-5">
        <img src="./img/img2.jpg"
          class="img-fluid" class="img2">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <center><h1>Iniciar Sesión</h1></center><br><br>
        
        <?php mostrarMensajes($errors);?>


<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form action="login.php" method="post" autocomplete="off">
      <div class="text-center mb-3">
        <p>Registrate con:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"><img src="img/facebook.png" width="30px"></i>
        </button>
        <button type="button" class="btn btn-link btn-floating mx-5">
          <i class="fab fa-google"><img src="img/google.png" width="30px"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"><img src="img/gorjeo.png" width="30px"></i>
        </button>
      </div>

      

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="text" id="usuario"  name="usuario"    class="form-control"  placeholder="Usuario"/>
        <label class="form-label" for="usuario">Nombre de usuario</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="password"    name="password"  class="form-control" placeholder="Contraseña"/>
        <label class="form-label" for="password">Contraseña</label>
      </div>
      <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <div class="d-grid gap-3 col-12">
          <button type="submit" class="btn btn-primary">Ingresar</button>

        </div>
 




      <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="Registro.php" role="tab"
      aria-controls="pills-register" aria-selected="false">Registro</a>
      </li>

      <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="admin/" role="tab"
      aria-controls="pills-register" aria-selected="false">Usuario Administrador</a>
      </li>
      </ul>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Recordarme </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="recupera.php">Olvidaste tu contraseña?</a>
        </div>
      </div>



      <!-- Register buttons -->
      <div class="text-center">
        <p>No eres miembro? <a href="Registro.php">Registrate</a></p>
      </div>
    </form>
  </div>
  
</div>
<!-- Pills content -->
      </div>
    </div>
  </div>
</section>

</main>



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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
