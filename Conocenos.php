<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAJES TIPICOS</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
.body{
    background-color: #F3E6E6;
}
.container-fluiid {
            text-align: center;
        }

        .p {
            text-align: righ;
            padding: 12px;
            margin-top: 100px;
            text-align: center;
            margin-left: 50px;

    
        }

/* CUSTOMIZE THE CAROUSEL
-------------------------------------------------- */

/* Carousel base class */
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 32rem;
}


/* MARKETING CONTENT
-------------------------------------------------- */

/* Center align the text within the three columns below the carousel */
.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
/* rtl:begin:ignore */
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}
/* rtl:end:ignore */


/* Featurettes
------------------------- */

.featurette-divider {
  margin: 5rem 0; /* Space out the Bootstrap <hr> more */
}

/* Thin out the marketing headings */
/* rtl:begin:remove */
.featurette-heading {
  letter-spacing: -.05rem;
}

/* rtl:end:remove */

/* RESPONSIVE CSS
-------------------------------------------------- */

@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 7rem;
  }
}




/* Agrega una clase de fondo de imagen */
.section-background {
    background-image: url('./img/f1.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen */
    background-size: cover;
    background-position: center;
    color: white; /* Ajusta el color del texto según sea necesario para que sea legible en la imagen de fondo */
}

    </style>
</head>

</style>
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

<!-- Carrusel-->
<main>
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/img3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/img4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/img5.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <!-- Mision -->
<div class="col-lg-4 section-background">
    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="./img/img3.jpg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    </svg>
    <h2 class="fw-normal">Misión</h2>
    <p>Nuestra misión es promover la apreciación y el respeto por la diversidad cultural al ofrecer una cuidadosa selección de trajes típicos auténticos y de alta calidad</p>
    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
</div><!-- /.col-lg-4 -->

<!-- Vision -->
<div class="col-lg-4 section-background">
    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    </svg>
    <h2 class="fw-normal">Visión</h2>
    <p>"Nuestra visión en Tradición y Elegancia es ser el principal destino en línea para la celebración de la diversidad cultural a través de la moda.</p>
    <br>
    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
</div><!-- /.col-lg-4 -->

<!-- Valores -->
<div class="col-lg-4 section-background">
    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    </svg>
    <h2 class="fw-normal">Valores</h2>
    <p>Creemos que la vestimenta tradicional es una forma de expresar nuestra identidad cultural y conectar con nuestras raíces. </p>
    <br>
    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
</div><!-- /.col-lg-4 -->

  </div><!-- /.row -->


  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading fw-normal lh-1">Quienes Somos </span></h2>
      <p class="lead">Bienvenidos a nuestra tienda en linea, para descubrir y adquirir la riqueza cultural y la belleza de los trajes típicos de todo el mundo. En nuestra tienda, nos apasiona celebrar la diversidad y la herencia de las diferentes culturas a través de la moda. Creemos que los trajes típicos son mucho más que simples prendas de vestir; son portadores de historias, 
        tradiciones y una profunda conexión con la identidad cultural.</p>
    </div>
    <div class="col-md-5">
    <img src="./img/img6.jpg " alt="" width="500" height="300">
  </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-5">
        <img src="./img/img7.jpg" alt="" width="100%" height="100%" style="object-fit: cover;">
    </div>
    <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Historia <span class="text-body-secondary">Tienda online</span></h2>
        <p class="lead">"En el corazón de Chiapas, una tierra rica en cultura y tradiciones, nació la idea de compartir la belleza de nuestros trajes típicos con el mundo. En un esfuerzo por promover la artesanía local y empoderar a nuestros vendedores, decidimos crear una plataforma en línea única, que se ha convertido en un hogar virtual para la diversidad y la creatividad de nuestra región.</p>

        <p class="lead">Nuestra historia comienza con un profundo amor por Chiapas y su gente. Durante años, hemos admirado la maestría de los artesanos locales y la riqueza de los trajes típicos que han sido transmitidos de generación en generación. Sin embargo, nos dimos cuenta de que a pesar de la abundancia de talento y artesanía excepcional, no existía una tienda en línea que permitiera a estos talentosos vendedores llegar a un público más amplio.</p>
    </div>
</div>



  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Celebrando la Riqueza Cultural de Chiapas</h2>
        <p class="lead">En nombre de Tradición y Elegancia, creemos en la belleza de la diversidad y la importancia de preservar las tradiciones culturales que enriquecen nuestra vida. Nuestra filosofía se basa en los siguientes principios:</p>

        <p class="lead">Preservar y Promover la Cultura Local: Reconocemos la importancia de las raíces culturales de Chiapas y estamos comprometidos a preservar y promover las artesanías y los trajes típicos de nuestra región. Creemos que estas manifestaciones culturales son un tesoro que merece ser compartido y celebrado en todo el mundo.</p>
    </div>
    <div class="col-md-5">
        <img src="./img/img8.jpg" alt="" width="90%" height="90%" style="object-fit: cover;">
    </div>
</div>



  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

</div><!-- /.container -->

</main>












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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
