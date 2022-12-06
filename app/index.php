<?php session_start(); ?>
<?php 
  if(isset($_SESSION['carrito'])){
    $carritom=$_SESSION['carrito'];
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap?1" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $urlweb ?>app/css/estilo.css">
    <title>Document</title>
</head>
<body>
    <!------Navbar 1------>
    <nav id="nav1" class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Fashion Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?modulo=ofertas">Ofertas diarias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?modulo=ropa">Ropa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Accesorios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tenis</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item position-relative">
            <a href="">
              <i class="bi bi-bell-fill box"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                2+
                <span class="visually-hidden">unread messages</span>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="">
              <li><a href="?modulo=carrito"><i class="bi bi-cart-fill box"></a></i></li>
            </a>
          </li>
      </ul>
      </div>
    </div>
  </nav>

  <!------Bloque 1------>
  <!------Navbar 2------>
  <div class="container">
  <section>
    <div class="container navbar2">
      <div class="row">
        <div class="col">
          <nav class="navbar navbar-expand-sm ">
            <div class="container-fluid nav2">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="?modulo=ropa">Ropa</a></li>
                      <li><a class="dropdown-item" href="#">Joyas</a></li>
                      <li><a class="dropdown-item" href="#">Relojes</a></li>
                      <li><a class="dropdown-item" href="#">Cinturones</a></li>
                      <li><a class="dropdown-item" href="#">Tenis</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div> 
      </div>
  </section>
</div>
<!--Contenedor Modulos--->
<div class="container">
    <?php $funciones->openModule($modulo); ?>
</div>
<div class="container-fluid bg-dark footer">
  <div class="col">
    <h6>
      <span class="material-symbols-outlined copy">copyright</span> 
      2022 Desarrollo de Aplicaciones en Internet
    </h6> 
  </div>
    <h6>usap.edu</h6>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>