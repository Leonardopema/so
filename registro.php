<?php
require './config/config.php';
require './config/database.php';
require './clases/clienteFunciones.php';
$db = new Database();
$con = $db->conectar();

$errors = [];

if(!empty($_POST)){

  $nombres = trim( $_POST['nombres']);
  $apellidos = trim( $_POST['apellidos']);
  $email = trim( $_POST['email']);
  $telefono = trim( $_POST['telefono']);
  $curp = trim( $_POST['curp']);
  $usuario = trim( $_POST['usuario']);
  $password = trim( $_POST['password']);
  $repassword = trim( $_POST['repassword']);
  
  if(esNulo([$nombres,$apellidos, $email, $telefono, $curp, $usuario, $password, $repassword])){
    $errors[]= "Debe llenar todos los campos";
  }
   
  if(!esEmail($email)){
    $errors[]="La direccion de correo no es válida";
  }
  if(!validaPassword($password,$repassword)){
    $errors[] = "Las contraseñas no coinciden";
  }
  if(usuarioExiste($usuario,$con)){
    $errors[] = "El nombre de usuario $usuario ya existe";
  }
  if(emailExiste($email,$con)){
    $errors[] = "El correo electronico $email  ya existe";
  }


  if(count($errors )==0) {
  $id = registraCliente([$nombres,$apellidos,$email,$telefono,$curp],$con);
   
  if($id >0){
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $token = generarToken();
    if(!registraUsuario([$usuario,$pass_hash,$token,$id],$con)){
      $errors[]="Error al registrar usuario";
    }
  }else{
    $errors[]="Error al registrar cliente";
  }
}


}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAJES TIPICOS</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="css/estilo.css">

<style>


</style>
</head>

<body>
<header>


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
          <a href="catalogo.php" class="item-menu-link">Catalogo</a>
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
    
    <a href="checkout.php" class="btn btn-primary">
      Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>

     </a>
    
    <button class="btn-hamburguesa" id="btn-hamburguesa">
      <span></span>
      <span></span>
      <span></span>
    </button>
 
  </div>

 
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
     

<!-- Contenido -->
<Main>
    <div class="container">
      <h2>Datos del cliente</h2>

    <?php mostrarMensajes($errors);?>


      <form  class="row g-3" action="registro.php" method="post" autocomplete="off">
      <div class="col-md-6">
        <label for="nombres"><span class="text-danger">*</span> Nombres</label>
        <input type="text" name="nombres" id="nombres" class="form-control" requireda>
      </div>

      <div class="col-md-6">
        <label for="apellidos"><span class="text-danger">*</span> Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" class="form-control" requireda>
      </div>

      <div class="col-md-6">
        <label for="email"><span class="text-danger">*</span> Correo Electronico</label>
        <input type="email" name="email" id="email" class="form-control" requireda>
        <span id="validaEmail" class="text-danger"></span>
      </div>

      <div class="col-md-6">
        <label for="telefono"><span class="text-danger">*</span> Telefono</label>
        <input type="tel" name="telefono" id="telefono" class="form-control" requireda>
      </div>

      <div class="col-md-6">
        <label for="curp"><span class="text-danger">*</span> Curp</label>
        <input type="text" name="curp" id="curp" class="form-control" requireda>
      </div>

      <div class="col-md-6">
        <label for="usuario"><span class="text-danger">*</span> Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" requireda>
         <span id="validaUsuario" class="text-danger"></span>
      </div>

      <div class="col-md-6">
        <label for="password"><span class="text-danger">*</span> Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" requireda>
      </div>

      <div class="col-md-6">
        <label for="repassword"><span class="text-danger">*</span> Repetir Contraseña</label>
        <input type="password" name="repassword" id="repassword" class="form-control" requireda>
      </div>

      <i><b>Nota:</b> Los campos con asterisco son obligatorios</i>

      <div class="col-12">
       <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
      </form>
      <br><br>
      <div class="text-left"> <!-- Contenedor para alinear a la derecha -->
           <a href="login.php"><button type="submit" class="btn btn-success">Regresar</button></a>
      </div>
    </div>

</Main>




<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Incluye la biblioteca de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<script>
  let txtUsuario = document.getElementById('usuario')
  txtUsuario.addEventListener("blur",function(){
    existeUsuario(txtUsuario.value)
  },false)

  let txtEmail = document.getElementById('email')
  txtEmail.addEventListener("blur",function(){
    existeEmail(txtEmail.value)
  },false)

  function existeUsuario(usuario){
    let url="clases/clienteAjax.php"
    let formData = new FormData()
    formData.append("action","existeUsuario")
    formData.append("usuario",usuario)

    fetch(url,{
      method: 'POST',
      body: formData
    }).then(response => response.json())
    .then(data =>{
      if(data.ok){
        document.getElementById('usuario').value = ''
        document.getElementById('validaUsuario').innerHTML = 'Usuario no disponible'
      }else{
        document.getElementById('validaUsuario').innerHTML = ''
      }
    })

  }

  
  function existeEmail(email){
    let url="clases/clienteAjax.php"
    let formData = new FormData()
    formData.append("action","existeEmail")
    formData.append("email",email)

    fetch(url,{
      method: 'POST',
      body: formData
    }).then(response => response.json())
    .then(data =>{
      if(data.ok){
        document.getElementById('email').value = ''
        document.getElementById('validaEmail').innerHTML = 'Email no disponible'
      }else{
        document.getElementById('validaEmail').innerHTML = ''
      }
    })

  }
</script>

</body>



</html>