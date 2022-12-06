<?php 
global $mysqli;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="app/css/estilo.css?1">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row mb-2">
        <div class="col">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="app/img/imgp.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="app/img/oferta.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="app/img/slider3.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="app/img/slider4.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="app/img/relojm.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="app/img/reloj.webp" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------Contenido productos------>
  <!------Bloque 2------>
  <section>
    <h1>Lo más vendido</h1>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">
        <?php 
          $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` ORDER BY idproducto ASC LIMIT 4";
            if ($stmt = $mysqli->prepare($strsql)) {
              $stmt->execute();
              $stmt->store_result();
              if ($stmt->num_rows > 0) {
                $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $url_imagen);
                while ($stmt->fetch()) {
                  ?>
                  <a href="?modulo=detalle_productos&idproducto=<?php echo $idproducto ?>">
                  <div class="col-auto">
                    <div class="card bg-dark">
                      <img class="card-img-top" src="<?php echo $url_imagen ?>" height="300px">
                      <div class="card-img-overlay">
                        <ul class="action">
                          <li><i class="bi bi-suit-heart-fill"></i></li>
                          <li><i class="bi bi-cart-fill"></i></li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre_producto ?></h5>
                        <p class="card-text"><?php echo " L ".number_format($precio, 2) ?></p>
                        <div class="rango">
                        <i class="bi bi-star-fill starts"></i>
                        <i class="bi bi-star-fill starts"></i>
                        <i class="bi bi-star-fill starts"></i>
                        <i class="bi bi-star-fill starts"></i>
                        <i class="bi bi-star-fill starts fa-gray"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                <?php
                }
              } else {
                echo "No hay datos para mostrar";
              }
            } else {
              echo "No se pudo preparar la consulta";
            }
          ?>
      </div>
  </section>
  <!------Bloque 3------>
  <section>
    <h1>Las mejores marcas</h1>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-2">
        <?php 
          $strsql = "SELECT `id_marca`, `nombre_marca`, `url_imagen` FROM `marcas` limit 3";
            if ($stmt = $mysqli->prepare($strsql)) {
              $stmt->execute();
              $stmt->store_result();
              if ($stmt->num_rows > 0) {
                $stmt->bind_result($id_marca, $nombre_marca, $url_imagen);
                while ($stmt->fetch()) {
                  ?>
                  <a href="?modulo=detalle_marcas&idmarca=<?php echo $id_marca ?>">
                  <div class="col-auto">
                    <div class="card bg-light">
                      <img src="<?php echo $url_imagen ?>" class="card-img-top" height="350px">
                      <div class="card-body bl-3">
                        <h5 class="card-title"><?php echo $nombre_marca ?></h5>
                      </div>
                    </div>
                  </div>
                  </a>
                <?php
                }
              } else {
                echo "No hay datos para mostrar";
              }
            } else {
              echo "No se pudo preparar la consulta";
            }
          ?>
      </div>
  </section>
  <!------Bloque 4------>
  <section>
  <h1>Oferta Especial</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
      <?php 
          $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` where idcategoria=2 ORDER BY idproducto ASC LIMIT 3";
            if ($stmt = $mysqli->prepare($strsql)) {
              $stmt->execute();
              $stmt->store_result();
              if ($stmt->num_rows > 0) {
                $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $url_imagen);
                while ($stmt->fetch()) {
                  ?>
                  <a href="?modulo=detalle_productos&idproducto=<?php echo $idproducto ?>">
                  <div class="col-auto">
                    <div class="card bg-light">
                      <img src="<?php echo $url_imagen ?>" class="card-img-top" height="450px" alt="...">
                      <span class="desc">30% descuento</span>
                      <div class="card-body bl-3">
                        <h5 class="card-title"><?php echo $nombre_producto ?></h5>
                        <p class="card-text"><s><?php echo " L ".number_format($precio, 2) ?></s></p>
                        <p class="card-text"><?php echo " L ".number_format($precio-($precio*0.30), 2) ?></p>
                      </div>
                    </div>
                  </div>
                  </a>
                <?php
                }
              } else {
                echo "No hay datos para mostrar";
              }
            } else {
              echo "No se pudo preparar la consulta";
            }
          ?>
    </div>
  </section>
  <!------Bloque 5------>
  <section>
  <h1>Compra por Categoría</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">
      <?php 
          $strsql = "SELECT `idcategoria` ,`nombre_categoria`, `imagen_categoria` FROM `categorias` ORDER BY idcategoria ASC LIMIT 4";
            if ($stmt = $mysqli->prepare($strsql)) {
              $stmt->execute();
              $stmt->store_result();
              if ($stmt->num_rows > 0) {
                $stmt->bind_result($idcategoria, $nombre_categoria, $imagen_categoria);
                while ($stmt->fetch()) {
                  ?>
                  <a href="?modulo=detalle_categorias&idcategoria=<?php echo $idcategoria ?>">
                  <div class="col-auto">
                    <div class="card bg-light">
                      <img src="<?php echo $imagen_categoria ?>" class="card-img-top" height="250px">
                      <div class="card-body bl-3">
                        <h5 class="card-title"><?php echo $nombre_categoria ?></h5>
                      </div>
                    </div>
                  </div>
                  </a>
                <?php
                }
              } else {
                echo "No hay datos para mostrar";
              }
            } else {
              echo "No se pudo preparar la consulta";
            }
          ?>
    </div>
  </section>
</body>
</html>