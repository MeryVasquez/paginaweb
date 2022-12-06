<link rel="stylesheet" href="app/css/estilo.css?1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-bg-secondary border-dark mb-3" style="max-width: 900px;">
            <?php
            global $mysqli;
            $idproducto = $_GET['idproducto'];
            $strsql = "SELECT idproducto, nombre_producto, descripcion, precio, cantidad, url_imagen FROM productos where idproducto=?";
            if ($stmt = $mysqli->prepare($strsql)) {
                $stmt->bind_param("i", $idproducto);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);
                    $stmt->fetch();
                    ?>
                    <div class="row g-0 p-4 align-items-center">
                        <div class="col-md-6">
                            <img class="img-fluid rounded" src="<?php echo $url_imagen ?>" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body text-start">
                                <h4 class="card-title"><?php echo $nombre_producto ?></h4>
                                <p class="card-text">Descripcion del producto: <b><span><?php echo $descripcion ?></span></b></p>
                                <p class="card-text">Cantidad en existencia: <b><span><?php echo $cantidad ?></span></b></p>
                                <h5 class="card-text">Precio: <b><span><?php echo "L " . number_format($precio, 2) ?></span></b></h5>
                                <form action="?modulo=llenarcarrito" method="POST" >
                                    <input name="id" type="hidden" id="id" value="<?php echo $idproducto?>" />
                                    <input name="nombre" type="hidden" id="nombre" value="<?php echo $nombre_producto?>" />
                                    <input name="descripcion" type="hidden" id="descripcion" value="<?php echo $descripcion?>" />
                                    <input name="imagen" type="hidden" id="imagen" value="<?php echo $url_imagen?>" />
                                    <input name="precio" type="hidden" id="precio" value="<?php echo $precio?>" />
                                    <p><input name="cantidad" type="number"  min="1" max="10" step="1" id="cantidad" value="1" /></p>
                                    <button class="btn btn-danger" type="submit"> <i class="bi bi-cart-plus"></i> Agregar al carrito</button>
                                </form>                    
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "No hay nada que mostrar";
                }
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);
                }
            } else {
                echo "No se pudo prepara la consulta";
            }
            ?>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">
            <?php
            global $mysqli;
            $idproducto = $_GET['idproducto'];
            $strsql = "SELECT idproducto, nombre_producto, descripcion, precio, cantidad, url_imagen FROM productos where idproducto!=?";
            if ($stmt = $mysqli->prepare($strsql)) {
                $stmt->bind_param("i", $idproducto);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);
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
                                        <p class="card-text"><?php echo " L " . number_format($precio, 2) ?></p>
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
                    echo "No hay nada que mostrar";
                }
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);
                }
            } else {
                echo "No se pudo prepara la consulta";
            }
            ?>
        </div>
    </div>
</div>