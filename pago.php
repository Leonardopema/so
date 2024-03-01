<?php
require './config/config.php';
require './config/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();
if($productos != null){
  foreach($productos as $clave => $cantidad){

     $sql = $con->prepare("SELECT id,nombre,precio,descuento, $cantidad AS cantidad FROM productos WHERE
     id=? and activo=1");
     $sql->execute([$clave]);
     $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
  }
}else{
    header("Location: index.php");
    exit;
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
    
    <a href="clases/carrito.php" class="btn btn-primary">
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


<!-- Contenido -->
<Main>
    <div class="container">
      <div class="row">
        <div class="col-6">
            <h4>Detalles de Pago</h4>
            <div id="paypal-button-container"></div>
        </div>

    <div class="col-6">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Subtotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if($lista_carrito == null){
              echo '<tr><td colspan="5" class="text-center"><b>Lista Vacia </b></td></tr>';
            }else{
              $total = 0;
              foreach($lista_carrito As $producto){
                $_id = $producto['id'];
                $nombre = $producto['nombre'];
                $precio = $producto['precio'];
                $descuento = $producto['descuento'];
                $cantidad = $producto['cantidad'];
                $precio_desc = $precio -(($precio * $descuento)/100);
                $subtotal = $cantidad * $precio_desc;
                $total +=$subtotal;
                ?>
   
            <tr>
              <td><?php echo $nombre; ?></td>
              <td>
                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php
                 echo MONEDA . number_format ($subtotal,2,'.',',');?></div>
              </td>
            </tr>
            <?php } ?>
            <tr>
              <td colspan="2">
                <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total,2,'.',',');?></p>
              </td>
            </tr>
          </tbody>
       <?php } ?>
        </table>

             </div>
         </div>
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
let btnHamburguesa = document.getElementById("btn-hamburguesa");
let menuNavegacion = document.getElementById("menu-navegacion");
btnHamburguesa.addEventListener('click', function(){
    menuNavegacion.classList.toggle("viewMenu");
});

$(".angle-view-sub-menu").click(function(){
  $(this).siblings("ul").toggle();
})
</script>
    
<script src="https://www.paypal.com/sdk/js?client-id=AXHO3hTrZjTR6qL4MCzOvfuNJ4qtq0EC-pyTqLrrEL_asMUF00ZAYcS1qU7pxT3zYPX2-T1bdYl0pSj-"></script>

<script>
    paypal.Buttons({
        style:{
            color:'blue',
            shape:'pill',
            label:'pay'
        },
        createorder: function(data,actions){
            return actions.order.create({
               purchase_units:[{
                amount:{
                    value: <?php echo $total; ?>
                }
               }]
            });
        },
        onApprove: function(data,actions){
            let URL = 'clases/captura.php'
          actions.order.capture().then(function(detalles){
             console.log(detalles);
             let url= 'clases/captura.php'
             return fetch(URL,{
              method: 'post',
              headers: {
                'content-type': 'application/json'
              },
                body:JSON.stringify({
                  detalles : detalles
                })
             })
          });
        },
        oncancel: function(data){
             alert("Pago Cancelado");
             console.log(data);
        }
    }).render('#paypal-button-container');
</script>

</body>



</html>