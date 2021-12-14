<?php

include "connection.php";
$obj =  new connection();
$conn = $obj->connection_db();

$form = [];
parse_str( $_POST["form"],$form);



$nombre_producto = $form["product_name"];
$precio_producto = $form["product_price"];
$img_producto = $form["product_img"];

//Nombre de la imagen
//$nombre_img = $_FILES['product_img']["name"];
//Carpeta del nombre temporal del archivo
//$file_tmp = $_FILES['product_img']['tmp_name'];
// Escojo cual es la carpeta donde se guardará el archivo de la foto
//$carpeta_imagenes_productos = "imagenes-productos/";
// GUARDO EL ARCHIVO DE LA FOTO EN LA CARPETA (imagenes-productos)
//$movefile = move_uploaded_file($file_tmp, $carpeta_imagenes_productos .$nombre_img);

$sql = "INSERT INTO productos (nombre, precio, foto) 
VALUES ('".$nombre_producto."', '".$precio_producto."', '".$img_producto."')";

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