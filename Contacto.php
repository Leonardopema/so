<!DOCTYPE html>
<center><html>
<head>
    <title>Contacto y Ubicación</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <header>
    <body class="body">
    <!DOCTYPE html>
<html>
<head>
<style>

body {
  background: #D9B280;
  font-family: "Roboto", sans-serif;
}

.container {
  background: #FFFFFF;
  width: 1500px;
  height: 900px;
  margin: 5% auto;
  position: relative;
}
.container .map {
  width: 45%;
  float: left;
}
.container .contact-form {
  width: 53%;
  margin-left: 2%;
  float: left;
}
.container .contact-form .title {
  font-size: 2.5em;
  font-family: "Roboto", sans-serif;
  font-weight: 700;
  color: #242424;
  margin: 5% 8%;
}
.container .contact-form .subtitle {
  font-size: 1.2em;
  font-weight: 400;
  margin: 0 4% 5% 8%;
}
.container .contact-form input,
.container .contact-form textarea {
  width: 330px;
  padding: 3%;
  margin: 2% 8%;
  color: #242424;
  border: 1px solid #B7B7B7;
}
.container .contact-form input::placeholder,
.container .contact-form textarea::placeholder {
  color: #242424;
}
.container .contact-form .btn-send {
  background: #A383C9;
  width: 180px;
  height: 60px;
  color: #FFFFFF;
  font-weight: 700;
  margin: 2% 8%;
  border: none;
}
</style>

</head>

</html>

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
     
<div class="container">
	<div class="map">
		<iframe src= "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15283.086348236991!2d-93.09515578565676!3d16.73824491314177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1699122289015!5m2!1ses-419!2smx"  width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>





	<div class="contact-form">
		<h1 class="title">Contacto</h1>
		<h2 class="subtitle">Estamos aqui para ayudarte, deja tu mensaje</h2>
		<form action="">
			<input type="text" name="name" placeholder="Su nombre" />
			<input type="email" name="e-mail" placeholder="Su correo electronico" />
			<input type="tel" name="phone" placeholder="Su número de celular"/>
			<textarea name="text" id="" rows="8" placeholder="Su mensaje"></textarea>
			<button class="btn-send">Enviar</button>
		</form>
	</div>
</div>
    
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
