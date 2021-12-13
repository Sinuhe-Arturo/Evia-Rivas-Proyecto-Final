<?php

include "connection.php";
$obj =  new connection();
$conn = $obj->connection_db();

//$nombre_producto = $_POST["product_name"];
//$precio_producto = $_POST["product_price"];
//$img_producto = $_POST["product_img"];

$form = [];
parse_str( $_POST["form"],$form);


$nombre_producto = $form["product_name"];
$precio_producto = $form["product_price"];
$img_producto = $form["product_img"];


$sql = "INSERT INTO productos (nombre, precio, foto) VALUES ('".$nombre_producto."', '".$precio_producto."', '".$img_producto."')";

$response = [];

if ($conn->query($sql) === TRUE) {
    $response["status"] = "success";
    $response["message"] = "Producto guardado satisfactoriamente";
    
    $sql = "SELECT * FROM productos WHERE nombre = '".$nombre_producto."'";
    $result = $conn->query($sql);
    $data_productos = $result->fetch_assoc();

    $response["data_productos"] = $data_productos;
}else{
    $response["status"] = "error";
    $response["message"] = "Error al guardar el producto";
}

$json_response = json_encode($response);
echo $json_response;

?>