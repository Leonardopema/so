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


<!-- Contenido tarjetas -->
<Main>
    <div class="container">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
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
              <td><?php echo MONEDA . number_format ($precio_desc,2,'.',','); ?></td>
              <td>
                <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>"
                size="5" id="cantidad_<?php echo $id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
              </td>
              <td>
                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php
                 echo MONEDA . number_format ($subtotal,2,'.',',');?></div>
              </td>
              <th>
                <a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo 
                $_id;?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
              </th>
            </tr>
            <?php } ?>
            <tr>
              <td colspan="3"></td>
              <td colspan="2">
                <p class="h3" id="total"><?php echo MONEDA . number_format($total,2,'.',',');?></p>
              </td>
            </tr>
          </tbody>
       <?php } ?>
        </table>

      </div>
      <?php if($lista_carrito !== null){ ?>
      <div class="row">
        <div class="col-md-5 offset-md-7 d-grid gap-2">
           <a href="pago.php" class="btn btn-primary btn-lg">Realizar Pago</a>
        </div>

      </div>
        <?php } ?>
     </div>

</Main>
<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="eliminaModalLabel">ALERTA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estas seguro de eliminar el producto de la lista?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btn-eliminar"    type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>




<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Incluye la biblioteca de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script>

let eliminaModal = document.getElementById('eliminaModal')
eliminaModal.addEventListener('shown.bs.modal',function(event){
  let button = event.relatedTarget
  let id = button.getAttribute('data-bs-id')
  let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-eliminar')
  buttonElimina.value = id
})


  function actualizaCantidad(cantidad,id){
    let url = 'clases/actualizar_carrito.php'
    let formData = new FormData()
    formData.append('action','agregar')
    formData.append('id',id)
    formData.append('cantidad',cantidad)

    fetch(url,{
     method:'POST',
     body:formData,
     mode: 'cors'
    }).then(response => response.json())
    .then(data =>{
      if(data.ok){

        let divsubtotal = document.getElementById('subtotal_'+ id)
        divsubtotal.innerHTML = data.sub
         
        let total = 0.00
        let list = document.getElementsByName('subtotal[]')
        
        for(let i=0;i < list.length; i++){
          total += parseFloat(list[i].innerHTML.replace(/[$,]/g,''))
        }
        total = new Intl.NumberFormat('en-US',{
          minimumFractionDigits: 2
        }).format(total)
        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total


      }
    })
  }




  function eliminar(){

    let botonElimina = document.getElementById('btn-eliminar') 
    let id= botonElimina.value

    let url = 'clases/actualizar_carrito.php'
    let formData = new FormData()
    formData.append('action','eliminar')
    formData.append('id',id)

    fetch(url,{
     method:'POST',
     body:formData,
     mode: 'cors'
    }).then(response => response.json())
    .then(data =>{
      if(data.ok){

       location.reload()
      }
    })
  }
</script>
 
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
     


</body>



</html>