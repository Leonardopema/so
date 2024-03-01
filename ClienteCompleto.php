<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAJES TIPICOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
<style>
    #mostrarSlider{
    background-image: url("img/bannerr.jpeg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 50vh;
    padding: 50px;
    margin-bottom: -100px;
    
}
#mostrarSlider .Slider-banner{
    background-color: white;
    height: 100%;
    width: 50%;
    margin: auto;
    padding-top: 30px;
    text-align: center;
    opacity: 0.3;
}
#mostrarSlider H1{
    padding: 25px;
    text-align: center;
    color: rgb(80, 69, 69);
}
</style>
</head>

<body>

<header>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F5DCE9;">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="img/logo.png" width="130px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="ClienteCompleto.php"><h5>Inicio</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Conocenos.php"><h5>Conócenos</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><h5>Catalogo</h5></a>
                </li>
                
            </ul>
            <form class="d-flex">
                <button type="button" class="btn btn-success" onclick="window.location.href = 'login.php';">Regresar Anterior</button>
            </form>
        </div>
    </div>
</nav>
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
          <h4 class="h4" style="color: #800000; text-align: center;">¡Bienvenido a nuestra tienda de trajes típicos!</h4>
          <p class="h4_1" style="margin: 50px;">En nuestro rincón virtual, te invitamos a explorar la riqueza y la diversidad de las vestimentas de todo Chiapas.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
    <div class="row align-items-center text-center">
        <div class="col">
            <div class="image-container">
                <img src="img/img2.jpg" width="200px">
                <p>"Descubre la fascinante historia detrás de los Parachicos con solo un clic en nuestras imágenes."</p>
            </div>
        </div>
        <div class="col">
            <div class="image-container">
                <img src="img/img2.jpg" width="200px">
                <p>MEDIANA</p>
            </div>
        </div>
    </div>
</section>


<section class="banner1">

</section>

<footer class="footer">
<h6>@Copyright TRAJES TIPICOS. Derechos Reservados</h6>
<h6>TRADICION Y ELEGANCIA</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>



</html>