<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == '' ){
    echo 'Error al procesar la peticion';
    exit;
}else{

    $token_tmp = hash_hmac('sha1',$id, KEY_TOKEN);

    if($token == $token_tmp){ 

        $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
        $sql->execute([$id]);
        if($sql->fetchColumn()>0){

        $sql = $con->prepare("SELECT nombre, descripcion, precio,descuento FROM productos WHERE id=? AND activo=1");
        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
        $descuento = $row['descuento'];
        $precio_desc = $precio-(($precio * $descuento)/100);
        $dir_images = 'img/productos/' . $id.'/';

        $rutaImg = $dir_images . 'a1.jpg';

        if(!file_exists($rutaImg)){
            $rutaImg = 'img/no-photo.jpg';
        }
        $imagenes = array();
        if(file_exists($dir_images)){
            $dir =dir($dir_images);

            while(($archivo = $dir->read()) != false){
            if($archivo != 'a1.jpg' &&(strpos($archivo, 'jpg') ||strpos($archivo, 'jpeg') )){
                   $imagenes[] = $dir_images . $archivo;
              }
             }
             $dir->close();
        }
        }

    }else{
        echo 'Error al procesar la peticion';
        exit;
    }
}

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
          <a href="#" class="item-menu-link">Inicio</a>
        </li>
        <li class="item-menu">
          <a href="#" class="item-menu-link">Sobre Nosotros</a>
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
          <a href="#" class="item-menu-link">Servicios</a>
          <i class="fas fa-angle-down angle-view-sub-menu"></i>
          
          <ul class="sub-menu" id="sub-menu">
            <li class="item-menu">
              <a href="#" class="item-menu-link">Desarrollo Web</a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link">Posicionamiento SEO</a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link">Campañas de Google Ads</a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link">Campañas de Facebook Ads</a>
            </li>
            <li class="item-menu">
              <a href="#" class="item-menu-link">Diseño para Redes Sociales</a>
            </li>
          </ul>
        </li>
        
        <li class="item-menu">
          <a href="#" class="item-menu-link">Contacto</a>
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
     

<!--Contenido-->
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6"> <!-- Columna para el carrusel -->
                <div id="carouselImages" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                        </div>
                        <?php foreach($imagenes as $img) { ?>
                            <div class="carousel-item">
                                <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-6"> <!-- Columna para la información y botones -->
                <h2><?php echo $nombre; ?></h2>
                <?php if($descuento > 0) { ?>
                    <p><del><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></del></p>
                    <h2>
                        <?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?>
                        <small class="text-success"><?php echo $descuento; ?>% descuento</small>
                    </h2>
                <?php } else { ?>
                    <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>
                <?php } ?>
                <p class="lead">
                    <?php echo $descripcion; ?>
                </p>
                <div class="d-grid gap-3 col-10 mx-auto">
                    <button class="btn btn-primary" type="button">Comprar ahora</button>
                    <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo
                    $id; ?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
</main>


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