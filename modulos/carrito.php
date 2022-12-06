<link rel="stylesheet" href="app/css/estilo.css?1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<?php
global $mysqli;
global $urlweb;
?>
<div class="container contenido" >
  <h2 class="text-light text-center">Carrito de Compras </h2>

  <div class="table-responsive container">
    <table class="table table-dark table-hover align-middle contenido">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Imagen</th>
          <th scope="col">Precio</th>
          <th scope="col">cantidad</th>
          <th scope="col">subtotal</th>
          <th scope="col">Eliminar</th>

        </tr>
      </thead>
      <tbody>
          <?php
            $strsql="SELECT idcarrito, nombre_producto, descripcion, imgp, precio, cantidad, subtotal FROM carrito";          
            if($stmt = $mysqli->prepare($strsql)){
              $stmt->execute();
              $stmt->store_result();
              if($stmt->num_rows>0){
                  $stmt->bind_result($idcarrito, $nombre, $descripcion, $img, $precio, $cantidad, $subtotal);
                  while($stmt->fetch()){
                      ?>
                      <tr id="<?php echo $idcarrito ?>">
                      <td scope="row"><?php echo $nombre ?></td>
                      <td><?php echo $descripcion ?></td>
                      <td>
                        <img class="img-fluid" src="<?php echo $img ?>" alt="" width="80px" height="80px">
                      </td>
                      <td><?php echo "L " .number_format($precio,2) ?></td>      
                      <td class="text-center"><?php echo $cantidad ?></td>             
                      <td>
                        <?php echo "L " .number_format($subtotal, 2)?>
                      </td>
                      <td>
                        <a href="javascript:eliminar(<?php echo $idcarrito ?>)" class="btn btn-danger" >Eliminar</a>
                      </td>
                    </tr>
                    <?php
                  }
              } else{
                  echo "El carrito está vacío";
              }
          } else {
              echo "No se pudo preparar la consulta";
          }
          ?>

      </tbody>
    </table>
  </div>
  <a class="btn btn-info btn-outline-light" href="?modulo=vaciarcarrito"><b>Vaciar carrito</b></a>
  <a class="btn btn-success btn-outline-warning" href="https://www.paypal.com/hn/webapps/mpp/home?kid=p66059410258&gclid=EAIaIQobChMIsL_y5_Tl-wIVnoFaBR3nNgfTEAAYASAAEgLrcvD_BwE&gclsrc=aw.ds"><b>Pagar</b></a>

  <script>
    function eliminar(idcarrito)
    {
        var url = 'servicios/ws_admin_productos.php?accion=eliminarcarrito';

        fetch(url,
        {
            method: 'POST',
            body: JSON.stringify({
                "idcarrito": idcarrito
            })
        })
        .then((response) => response.json())
        .then( (data) => {
            alert(data.text);
            const row = document.getElementById(idcarrito);
            row.remove();
        })
        .catch(console.error)
  }
  </script>
 
</div>