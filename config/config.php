<?php
   
  define("CLIENT_ID","AWy6MUAy5VYu0pk_17cRvwEHlkMitKWSwlXfoaJDWzNOHIQgZvnOG-dUWlloA9-vzvjvElxqMVnvAK3S");
  define("CURRENCY","MXN");
  define("KEY_TOKEN","APR.wqc-354*");
  define("MONEDA","$");

  session_start();

  $num_cart = 0;
  if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
  }

?>