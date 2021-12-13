<?php

include "connection.php";
$obj =  new connection();
$conn = $obj->connection_db();

$id = $_GET["id"];

$sql = "DELETE FROM productos WHERE id = '".$id."' ";

$delete = false;

$response=[];

try {
    $conn->query($sql);
    $delete = true;
    $response["status"] = "success";
    $response["message"] = "Producto eliminado";
} catch (\Throwable $th) {
    $delete = false;
    $response["status"] = "error";
    $response["message"] = "Error al momento de eliminar el producto";
}

echo json_encode($response);
header('Location: formulario.php')

?>