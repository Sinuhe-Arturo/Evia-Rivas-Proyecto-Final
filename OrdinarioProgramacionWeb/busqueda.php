<?php 
include "connection.php";
$obj =  new connection();
$conn = $obj->connection_db();

require_once "BD/conexion.php";
$tabla="";
$consulta=" SELECT * FROM productos LIMIT 0";
$textoinput= "";
if(isset($_POST['productos']))
{
	$textoinput=$mysqli->real_escape_string($_POST['productos']);
	$consulta="SELECT * FROM productos WHERE 
	nombre LIKE '".$textoinput."%' OR
	precio LIKE '".$textoinput."%'";
}
$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
	echo "
	<table class='responsive-table table table-hover table-bordered'>
	<thead>
	<tr>
	<th class='bg-info' scope='col'>ID</th>
	<th class='bg-info' scope='col'>NOMBRE</th>
	<th class='bg-info' scope='col'>PRECIO</th>
	<th class='bg-info' scope='col'>FOTO</th>
	</tr>
	</thead><br>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td>".$fila['id']."</td>	
		<td>".$fila['nombre']."</td>
		<td>$ ".$fila['precio']."</td>
		<td>".$fila['foto']."</td>
		</tr>";
	}
	echo "</tbody>
	</table>";
}else{
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);   
    echo "
	<table class='responsive-table table table-hover table-bordered'>
	<thead>
	<tr>
	<th class='bg-info' scope='col'>ID</th>
	<th class='bg-info' scope='col'>NOMBRE</th>
	<th class='bg-info' scope='col'>PRECIO</th>
	<th class='bg-info' scope='col'>FOTO</th>
	</tr>
	</thead><br>
	<tbody>";
	while($row = $result->fetch_assoc()) {
        echo "<tr>
		<td>".$row['id']."</td>	
		<td>".$row['nombre']."</td>
		<td>$ ".$row['precio']."</td>
		<td>".$row['foto']."</td>
		</tr>";
    }
    echo "</tbody>
	</table>";
}
?>