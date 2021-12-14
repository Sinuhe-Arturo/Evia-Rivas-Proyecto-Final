<?php

include "connection.php";
$obj =  new connection();
$conn = $obj->connection_db();

$tabla = "";
$query = "SELECT * FROM productos ORDER BY id"

if(isset($_POST['productos']))
{
    $q=$conn->real_escape_string($_POST['productos']);
    $query="SELECT * FROM productos WHERE nombre LIKE '%".$q."%' OR precio LIKE '%".$q."%';"
}

$buscarProductos=$conn->query($query);
if ($buscarProductos->num_rows > 0)
{
    $tabla.=
    '<table class="table">
        <tr class="bg-primary">
            <td>id</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Foto</td>
        </tr>';

    while($filaProductos= $buscarProductos->fetch_assoc())
    {
        $tabla.=
        '<tr>
            <td>'.$filaAlumnos['id'].'</td>
            <td>'.$filaAlumnos['nombre'].'</td>
            <td>'.$filaAlumnos['precio'].'</td>
            <td>'.$filaAlumnos['foto'].'</td>
        </tr>
        ';
    }

    $tabla.='</table>';
} else 
{
    $tabla="No se encontraron coincidencias.";
}

echo $tabla;

?>