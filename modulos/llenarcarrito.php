<?php
require 'config.php';
$id=$_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$imagen = $_POST["imagen"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$subtotal = $precio*$cantidad;
global $mysqli;
$stmt = "INSERT INTO carrito(nombre_producto, descripcion, imgp, precio, cantidad, subtotal)
VALUES('$nombre', '$descripcion', '$imagen' ,'$precio', '$cantidad', '$subtotal');";

$strsql = mysqli_query($mysqli, $stmt);

if($strsql){
   echo "<script>alert('El producto se agrego al carrito');
   location.href = '?modulo=carrito';
   </script>";

}
else{
    return "error";
}
?>