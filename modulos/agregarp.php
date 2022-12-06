<form class="agregarp">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre producto</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">id categoria</label>
  </div>
  <div class="mb-3">
    <label for="formFileMultiple" class="form-label">Imagen</label>
    <input class="form-control" type="file" id="formFileMultiple" multiple>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
        function agregarprod(idproducto)
        {
            var url = 'servicios/ws_admin_productos.php?accion=agregarprod';

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