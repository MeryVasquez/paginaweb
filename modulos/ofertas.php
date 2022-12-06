<link rel="stylesheet" href="app/css/estilo.css?1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
            <?php
            global $mysqli;
            $strsql = "SELECT idproducto, nombre_producto, idcategoria, descripcion, precio, cantidad, url_imagen FROM productos WHERE idproducto>9 LIMIT 4";
            if ($stmt = $mysqli->prepare($strsql)) {
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen);
                    while ($stmt->fetch()) {
                        ?>
                        <div class="row g-0 p-4">
                            <a href="?modulo=detalle_productos&idproducto=<?php echo $idproducto ?>">
                                <div class="col-auto">
                                    <div class="card bg-secondary">
                                        <img src="<?php echo $url_imagen ?>" class="card-img-top" height="300px">
                                        <span class="desc">50% descuento</span>
                                        <div class="card-img-overlay">
                                            <ul class="action">
                                                <li><i class="bi bi-suit-heart-fill"></i></li>
                                                <li><i class="bi bi-cart-fill"></i></li>
                                            </ul>
                                        </div>
                                        <div class="card-body bl-3">
                                            <h5 class="card-title text-light"><?php echo $nombre_producto ?></h5>
                                            <p class="card-text text-light"><?php echo " L " . number_format($precio, 2) ?></p>
                                            <div class="rango">
                                                <i class="bi bi-star-fill starts"></i>
                                                <i class="bi bi-star-fill starts"></i>
                                                <i class="bi bi-star-fill starts"></i>
                                                <i class="bi bi-star-fill starts fa-gray"></i>
                                                <i class="bi bi-star-fill starts fa-gray"></i>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    echo "No hay nada que mostrar";
                }
            } else {
                echo "No se pudo prepara la consulta";
            }
            ?>
    </div>
</div>