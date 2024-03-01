<?php
require './config/config.php';
require './config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id,nombre,precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
  /* Estilo para colocar las tarjetas del mismo tamaño*/
  .card-img-custom {
    width: 200px; /* Ancho fijo para la imagen */
    height: 250px; /* Alto fijo para la imagen */
    object-fit: cover; /* Ajustar la imagen manteniendo la relación de aspecto y cubriendo el espacio definido */
}

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

    
    <a href="checkout.php" class="btn btn-primary me-2">
      Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
     </a>

     <form class="d-flex">
  <?php if (isset($_SESSION['user_name'])) : ?>
    <button type="button" class="btn btn-success" onclick="window.location.href = 'logout.php';">
      <img src="img/usuario.jpg" width="50px"> Cerrar Sesión
    </button>
  <?php else : ?>
    <button type="button" class="btn btn-success" onclick="window.location.href = 'login.php';">
      <img src="img/usuario.jpg" width="50px"> Iniciar Sesión
    </button>
  <?php endif; ?>
</form>
    
     <a href="#" class="btn btn-success"> <?php echo $_SESSION['user_name']; ?></a>
    


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
     

<!-- Contenido tarjetas -->
<Main>
    <div class="container">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
     <?php foreach($resultado as $row) { ?>
    <div class="col">
    <div class="card shadow-sm" >
             <?php 

             $id = $row['id'];
             $imagen ="img/productos/" . $id ."/a1.jpg" ;

             if(!file_exists($imagen)){
                $imagen = "./img/no-photo.jpg" ;
             }
             ?>
             
      <img src="<?php echo $imagen; ?>"  class="card-img-top card-img-custom" >
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
        <p class="card-text">$<?php echo number_format( $row['precio'],2,'.',','); ?></p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
           <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo
           hash_hmac('sha1',$row['id'],KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
          </div>
          <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo
            $row['id']; ?>, '<?php echo
           hash_hmac('sha1',$row['id'],KEY_TOKEN); ?>')">Agregar al carrito
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
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
  function addProducto(id,token){
    let url = './clases/carrito.php'
    let formData = new FormData()
    formData.append('id',id)
    formData.append('token',token)

    fetch(url,{
     method:'POST',
     body:formData,
     mode: 'cors'
    }).then(response => response.json())
    .then(data =>{
      if(data.ok){
        let elemento = document.getElementById("num_cart")
        elemento.innerHTML = data.numero
      }
    })
  }
</script>



</body>



</html>