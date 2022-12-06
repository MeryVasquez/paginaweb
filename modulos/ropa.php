<link rel="stylesheet" href="app/css/estilo.css?1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">
        <?php 
        global $mysqli;
          $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` WHERE idcategoria=1";
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
    </div>
</div>