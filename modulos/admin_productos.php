<link rel="stylesheet" href="app/css/estilo.css?1">
<?php
global $mysqli;
global $urlweb;
?>
    <h3 class="text-center text-light">Administrador de productos</h3>
    <table class="table table-dark text-center">
        <thead>
            <tr>
                <th>Producto</th>
                <th>categoria</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria";
                if ($stmt = $mysqli->prepare($strsql)) {
                    $stmt->execute();
                    $stmt->store_result();
                    if($stmt->num_rows > 0) {
                        $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
                        while ($stmt->fetch()) {
                            ?>
                            <tr id="<?php echo $idproducto ?>">
                            <td><?php echo $nombre_producto ?></td>
                            <td><?php echo $categoria?></td>
                            <td><?php echo $descripcion ?></td>
                            <td><img src="<?php echo $url_imagen ?>" width="100px" height="100px" alt=""></td>
                            <td><?php echo number_format($precio,2) ?></td>
                            <td><?php echo $cantidad ?></td>
                            <td><a class="btn btn-primary" href="">Editar</a></td>
                            <td><a class="btn btn-danger" href="javascript:eliminar(<?php echo $idproducto ?>)">Eliminar</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "No hay registros";
                    }
                } else {
                    echo "No se pudo preparar la consulta";
                }
            ?>
        </tbody>
    </table>
    <a class="btn btn-info" href="?modulo=agregarp">Agregar producto</a>
    <script>
        function eliminar(idproducto)
        {
            var url = 'servicios/ws_admin_productos.php?accion=eliminar';

            fetch(url, {
                method: 'POST',
                body: JSON.stringify({
                    "idproducto": idproducto
                })
            })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                const row = document.getElementById(idproducto);
                row.remove();
            })
            .catch((error) => {
                console.error(error);
            })
        }
    </script>