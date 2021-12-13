<?php 

include "connection.php";
$obj =  new connection();
$conn = $obj->connection_db();

//$id = $_POST["id"];
//$nombre_producto = $_POST["product_name"];
//$precio_producto = $_POST["product_price"];
//$img_producto = $_POST["product_img"];

$form = [];
parse_str( $_POST["form"],$form);

$nombre_producto = $form["product_name"];
$precio_producto = $form["product_price"];
$img_producto = $form["product_img"];
$id = $form["id"];


$sql  = "UPDATE productos SET nombre='".$nombre_producto."', precio='".$precio_producto."' ,
foto ='".$img_producto."' WHERE  id = '".$id."' ";

$update = false;
$response = [];
try {
    $conn->query($sql);
    $update = true;
    $response["status"] = "success";
    $response["message"] = "Usuario actualizado";
} catch (\Throwable $th) {
    $update = false;
    $response["status"] = "error";
    $response["message"] = "Error al actualizar el producto";
}

echo json_encode($response);

?>