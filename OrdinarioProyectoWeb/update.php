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
$descripcion_producto = $form["product_description"];
//$img_producto = $form["product_img"];
$id = $form["id"];

$sql_nombre_foto = "SELECT * FROM productos WHERE  id = '".$id."'";
$res = $conn->query($sql_nombre_foto);

while($row = mysqli_fetch_array($res))
{
    $img = $row["foto"];
    unlink("imagenes-productos/".$img."");
}


//Nombre de la imagen
$nombre_img = $_FILES['product_img']["name"];
//Carpeta del nombre temporal del archivo
$file_tmp = $_FILES['product_img']['tmp_name'];
// Escojo cual es la carpeta donde se guardará el archivo de la foto
$carpeta_imagenes_productos = "imagenes-productos/";
// GUARDO EL ARCHIVO DE LA FOTO EN LA CARPETA (imagenes-productos)
$movefile = move_uploaded_file($file_tmp, $carpeta_imagenes_productos .$nombre_img);

$sql  = "UPDATE productos SET nombre='".$nombre_producto."', precio='".$precio_producto."',
descripcion='".$descripcion_producto."', foto ='".$nombre_img."' WHERE  id = '".$id."' ";

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
$json_response = json_encode($response);
echo json_encode($response);

?>