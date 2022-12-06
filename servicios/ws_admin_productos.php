<?php
require "../config.php";
$accion = isset($_GET['accion']) ? $_GET['accion'] : "default";

    switch($accion)
    {
        case "eliminar":
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            if (isset($data)) {
                $strsql = "DELETE FROM productos WHERE idproducto =?";
                $stmt = $mysqli->prepare($strsql);
                $stmt->bind_param("i", $data->idproducto);
                $stmt->execute();
                if ($stmt->errno == 0) {
                    $text = "El producto se elimino correctamente";
                } else {
                    $text = "No se pudo ejecutar la consulta";
                }
            } else {
                $text = "No se recibieron los parametros";
            }
            break;
            case "eliminarcarrito":
                $json =file_get_contents('php://input');
                $data = json_decode($json);
                $data ->idcarrito;
                if(isset($data)){
                    $strsql ="DELETE FROM carrito WHERE idcarrito= ?";
                    $stmt = $mysqli->prepare($strsql);
                    $stmt->bind_param("i", $data->idcarrito);
                    $stmt->execute();
                    if($stmt->errno ==0){
                        $text= "El producto se eliminó de manera correcta";
                    } else {
                        $text= "No se pudo ejecutar la consulta";
                    }
    
                } else {
                    $text= "No se recibieron los parametros correctos";
            
                }
            break;
            case "agregarprod":
                $json = file_get_contents('php://input');
                $data = json_decode($json);
            if (isset($data)) {
                $strsql = "INSERT INTO idproducto, nombre_producto, idcategoria, idmarca, descripcion, precio, cantidad, url_imagen, fecha_creacion FROM productos ";
                $stmt = $mysqli->prepare($strsql);
                $stmt->bind_param("i", $data->idproducto);
                $stmt->execute();
                if ($stmt->errno == 0) {
                    $text = "El producto se agrego correctamente";
                } else {
                    $text = "No se pudo ejecutar la consulta";
                }
            } else {
                $text = "No se recibieron los parametros";
            }
                break;
        case "default":
            break;
    }

    $jsonreturn = array(
        "text" => $text
    );

    echo json_encode($jsonreturn)
?>